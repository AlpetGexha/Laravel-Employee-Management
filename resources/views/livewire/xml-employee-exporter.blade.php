<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>XML Employee Data Manager</h5>
            </div>
            <div class="card-body">
                @if ($error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endif

                @if ($status)
                <div class="alert alert-success">
                    {{ $status }}
                </div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">XML Export</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="exportCount">Number of employees to export:</label>
                                    <input type="number" wire:model="exportCount" class="form-control" min="1" max="50">
                                </div>

                                <div class="btn-group mb-3">
                                    <button wire:click="generateSampleXml" class="btn btn-secondary" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="generateSampleXml">Generate Sample XML</span>
                                        <span wire:loading wire:target="generateSampleXml">Generating...</span>
                                    </button>

                                    <button wire:click="exportRealEmployees" class="btn btn-primary" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="exportRealEmployees">Export Employees XML</span>
                                        <span wire:loading wire:target="exportRealEmployees">Exporting...</span>
                                    </button>
                                </div>

                                @if ($generatedXml)
                                <div class="mt-3">
                                    <button wire:click="downloadXml" class="btn btn-success">
                                        <i class="fas fa-download"></i> Download XML
                                    </button>

                                    <button wire:click="togglePreview" class="btn btn-info">
                                        {{ $isPreviewVisible ? 'Hide' : 'Show' }} XML Preview
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">XML Import</div>
                            <div class="card-body">
                                <form wire:submit.prevent="importXml">
                                    <div class="mb-3">
                                        <label for="xmlFile" class="form-label">Upload XML File</label>
                                        <input type="file" wire:model="xmlFile" class="form-control" accept=".xml" id="xmlFile">
                                        @error('xmlFile') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                        <span wire:loading.remove wire:target="importXml">Import XML</span>
                                        <span wire:loading wire:target="importXml">Importing...</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($isPreviewVisible && $xmlContent)
                <div class="card mb-4">
                    <div class="card-header">XML Preview</div>
                    <div class="card-body">
                        <pre class="bg-light p-3 overflow-auto" style="max-height: 300px;"><code>{{ htmlspecialchars($xmlContent) }}</code></pre>
                    </div>
                </div>
                @endif

                @if (count($importedEmployees) > 0)
                <div class="card">
                    <div class="card-header">Imported Employees</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($importedEmployees as $employee)
                                    <tr>
                                        <td>{{ $employee['id'] }}</td>
                                        <td>{{ $employee['name'] }}</td>
                                        <td>{{ $employee['email'] ?? '-' }}</td>
                                        <td>{{ $employee['position'] ?? '-' }}</td>
                                        <td>{{ $employee['department'] ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
