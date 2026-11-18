
@extends('layouts.app')

@section('title', 'Patient Records')

@section('content')

<!-- PAGE HEADING -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">

    <div>
        <h2 class="fw-bold mb-1">Patient Records</h2>
        <p class="text-muted mb-0">
            Manage registered clinic patients.
        </p>
    </div>

    <a href="{{ route('patients.create') }}" class="btn btn-primary px-3 py-2">
        + Register New Patient
    </a>

</div>

<!-- TOTAL REGISTERED PATIENTS -->
<div class="row mb-4">

    <div class="col-md-4 col-sm-6">

        <div class="card">
            <div class="card-body p-3">

                <div class="text-muted mb-1">
                    Total Registered Patients
                </div>

                <h2 class="fw-bold text-primary mb-0">
                    {{ number_format($totalPatients) }}
                </h2>

            </div>
        </div>

    </div>

</div>

<!-- PATIENT TABLE CARD -->
<div class="card">

    <div class="card-body p-4">

        <!-- SEARCH FORM -->
        <form action="{{ route('patients.index') }}"
              method="GET"
              class="row g-2 mb-4">

            <div class="col-md-9">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search patient number or name..."
                    value="{{ $search }}"
                >
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    Search
                </button>
            </div>

            <div class="col-md-1">
                <a href="{{ route('patients.index') }}"
                   class="btn btn-outline-secondary w-100">
                    Clear
                </a>
            </div>

        </form>

        <!-- PATIENT RECORDS TABLE -->
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>
                        <th>Patient No.</th>
                        <th>Full Name</th>
                        <th>Birth Date</th>
                        <th>Sex</th>
                        <th>Contact Number</th>
                        <th class="text-center">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($patients as $patient)

                        <tr>

                            <td class="fw-semibold">
                                {{ $patient->patient_number }}
                            </td>

                            <td>
                                {{ $patient->last_name }}, {{ $patient->first_name }}
                            </td>

                            <td>
                                {{ $patient->birth_date->format('M d, Y') }}
                            </td>

                            <td>
                                {{ $patient->sex }}
                            </td>

                            <td>
                                {{ $patient->contact_number ?: 'N/A' }}
                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    <!-- VIEW -->
                                    <a href="{{ route('patients.show', $patient) }}"
                                       class="btn btn-sm btn-outline-info">
                                        View
                                    </a>

                                    <!-- EDIT -->
                                    <a href="{{ route('patients.edit', $patient) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <!-- DELETE -->
                                    <form action="{{ route('patients.destroy', $patient) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this patient record?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">

                                @if ($search)
                                    No patients found matching "{{ $search }}".
                                @else
                                    No patient records yet. Register your first patient.
                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">

            <small class="text-muted">
                Showing {{ $patients->firstItem() ?? 0 }}
                to {{ $patients->lastItem() ?? 0 }}
                of {{ $patients->total() }} records
            </small>

            <div>
                {{ $patients->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

</div>

@endsection
