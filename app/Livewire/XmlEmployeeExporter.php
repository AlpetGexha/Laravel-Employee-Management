<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Services\XmlDataService;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;

class XmlEmployeeExporter extends Component
{
    use WithFileUploads;

    public $xmlFile;
    public $generatedXml;
    public $exportCount = 10;
    public $status = '';
    public $error = '';
    public $xmlContent = '';
    public $importedEmployees = [];
    public $exportedFilePath = '';
    public $isPreviewVisible = false;

    public function generateSampleXml()
    {
        try {
            $xmlService = new XmlDataService;
            $this->generatedXml = $xmlService->generateSampleXml($this->exportCount);
            $this->xmlContent = $this->generatedXml;
            $this->status = "Sample XML generated for {$this->exportCount} employees.";
            $this->isPreviewVisible = true;
            $this->error = '';
        } catch (Exception $e) {
            $this->error = 'Error generating XML: ' . $e->getMessage();
            $this->status = '';
        }
    }

    public function exportRealEmployees()
    {
        try {
            // Get employees with their departments and payrolls
            $employees = Employee::with(['department', 'payrolls'])
                ->take($this->exportCount)
                ->get();

            if ($employees->isEmpty()) {
                $this->error = 'No employees found to export.';

                return;
            }

            $xmlService = new XmlDataService;
            $this->generatedXml = $xmlService->exportEmployeesToXml($employees);
            $this->xmlContent = $this->generatedXml;
            $this->status = "Exported {$employees->count()} employees to XML.";
            $this->isPreviewVisible = true;
            $this->error = '';

            // Save XML to file
            $this->exportedFilePath = $xmlService->saveXmlExport($this->generatedXml);

        } catch (Exception $e) {
            $this->error = 'Error exporting employees: ' . $e->getMessage();
            $this->status = '';
        }
    }

    public function downloadXml()
    {
        if (! $this->generatedXml) {
            $this->error = 'No XML content to download.';

            return null;
        }

        return response()->streamDownload(function () {
            echo $this->generatedXml;
        }, 'employee_export.xml');
    }

    public function togglePreview()
    {
        $this->isPreviewVisible = ! $this->isPreviewVisible;
    }

    public function resetData()
    {
        $this->reset(['generatedXml', 'status', 'error', 'xmlContent', 'importedEmployees', 'exportedFilePath', 'isPreviewVisible']);
    }

    public function render()
    {
        return view('livewire.xml-employee-exporter');
    }
}
