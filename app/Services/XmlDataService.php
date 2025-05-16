<?php

namespace App\Services;

use App\Models\Employee;
use DOMDocument;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Log;
use SimpleXMLElement;

class XmlDataService
{
    /**
     * Export employees data to XML format
     *
     * @param  Collection|array  $employees
     * @return string XML content
     */
    public function exportEmployeesToXml($employees): string
    {
        // Create XML document
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><employees></employees>');

        foreach ($employees as $employee) {
            // Create employee node
            $employeeNode = $xml->addChild('employee');

            // Add employee attributes and elements
            $employeeNode->addAttribute('id', $employee->id);
            $employeeNode->addChild('first_name', htmlspecialchars($employee->first_name ?? ''));
            $employeeNode->addChild('last_name', htmlspecialchars($employee->last_name ?? ''));
            $employeeNode->addChild('email', htmlspecialchars($employee->email ?? ''));
            $employeeNode->addChild('phone', htmlspecialchars($employee->phone ?? ''));
            $employeeNode->addChild('address', htmlspecialchars($employee->address ?? ''));

            // Add department details as a sub-element
            if ($employee->department) {
                $departmentNode = $employeeNode->addChild('department');
                $departmentNode->addAttribute('id', $employee->department->id);
                $departmentNode->addChild('name', htmlspecialchars($employee->department->name ?? ''));
            }

            // Add payroll details
            if ($employee->payrolls && count($employee->payrolls) > 0) {
                $payrollsNode = $employeeNode->addChild('payrolls');

                foreach ($employee->payrolls as $payroll) {
                    $payrollNode = $payrollsNode->addChild('payroll');
                    $payrollNode->addAttribute('id', $payroll->id);
                    $payrollNode->addChild('month', htmlspecialchars($payroll->month ?? ''));
                    $payrollNode->addChild('year', htmlspecialchars($payroll->year ?? ''));
                    $payrollNode->addChild('salary', $payroll->salary);
                    $payrollNode->addChild('bonus', $payroll->bonus);
                }
            }
        }

        // Format XML with proper indentation
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());

        return $dom->saveXML();
    }

    /**
     * Import employees from XML string
     *
     * @return array Imported employee IDs
     */
    public function importEmployeesFromXml(string $xmlContent): array
    {
        $importedIds = [];

        try {
            // Parse XML
            $xml = new SimpleXMLElement($xmlContent);

            foreach ($xml->employee as $employeeNode) {
                $employeeData = [
                    'first_name' => (string) $employeeNode->first_name,
                    'last_name' => (string) $employeeNode->last_name,
                    'email' => (string) $employeeNode->email,
                    'phone' => (string) $employeeNode->phone,
                    'address' => (string) $employeeNode->address,
                ];

                // Check if employee already exists
                $employee = Employee::where('email', $employeeData['email'])->first();

                if (! $employee) {
                    // Create new employee
                    $employee = Employee::create($employeeData);
                } else {
                    // Update existing employee
                    $employee->update($employeeData);
                }

                $importedIds[] = $employee->id;
            }
        } catch (Exception $e) {
            // Log error
            Log::error('XML Import error: ' . $e->getMessage());
            throw $e;
        }

        return $importedIds;
    }

    /**
     * Save XML export to storage
     *
     * @return string File path
     */
    public function saveXmlExport(string $xmlContent): string
    {
        $filename = 'employees_export_' . date('Y-m-d_His') . '.xml';
        $path = 'exports/' . $filename;

        Storage::disk('public')->put($path, $xmlContent);

        return $path;
    }

    /**
     * Generate sample XML for demo purposes
     */
    public function generateSampleXml(int $count = 5): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><employees></employees>');

        for ($i = 1; $i <= $count; $i++) {
            $employee = $xml->addChild('employee');
            $employee->addAttribute('id', $i);
            $employee->addChild('first_name', "First{$i}");
            $employee->addChild('last_name', "Last{$i}");
            $employee->addChild('email', "employee{$i}@example.com");
            $employee->addChild('phone', "+1234567{$i}");
            $employee->addChild('address', "Address line {$i}, City");

            $department = $employee->addChild('department');
            $department->addAttribute('id', rand(1, 5));
            $department->addChild('name', 'Department ' . rand(1, 5));

            $payrolls = $employee->addChild('payrolls');

            for ($j = 1; $j <= 3; $j++) {
                $payroll = $payrolls->addChild('payroll');
                $payroll->addAttribute('id', ($i * 10) + $j);
                $payroll->addChild('month', rand(1, 12));
                $payroll->addChild('year', 2025);
                $payroll->addChild('salary', rand(3000, 8000));
                $payroll->addChild('bonus', rand(200, 1000));
            }
        }

        // Format XML with proper indentation
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());

        return $dom->saveXML();
    }
}
