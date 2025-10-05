@extends('layouts.master')

@section('title', 'Profile Settings - Sri Lankan Vaccine Safety Network')

@section('content')
<div class="container-fluid" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <!-- Profile Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius: 50%; margin-bottom: 1rem; box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);">
                        <i class="fas fa-user-md" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <h2 style="color: #1e293b; font-weight: bold; margin-bottom: 0.5rem;">Profile Settings</h2>
                    <p style="color: #64748b; margin: 0;">Manage your account information and security settings</p>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Profile Information Card -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100" style="border: none; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); background: white;">
                    <div class="card-header" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius: 1rem 1rem 0 0; padding: 1.5rem;">
                        <h5 style="color: white; margin: 0; font-weight: 600;">
                            <i class="fas fa-user-circle me-2"></i>Profile Information
                        </h5>
                    </div>
                    <div class="card-body d-flex flex-column" style="padding: 2rem;">
                        <div class="flex-grow-1">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Settings Card -->
            <div class="col-lg-6 mb-4">
                <div class="card h-100" style="border: none; border-radius: 1rem; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); background: white;">
                    <div class="card-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 1rem 1rem 0 0; padding: 1.5rem;">
                        <h5 style="color: white; margin: 0; font-weight: 600;">
                            <i class="fas fa-shield-alt me-2"></i>Security Settings
                        </h5>
                    </div>
                    <div class="card-body d-flex flex-column" style="padding: 2rem;">
                        <div class="flex-grow-1">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danger Zone Card -->
        <div class="row">
            <div class="col-12">
                <div class="card" style="border: 2px solid #fecaca; border-radius: 1rem; box-shadow: 0 10px 25px rgba(239, 68, 68, 0.1); background: white;">
                    <div class="card-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); border-radius: 1rem 1rem 0 0; padding: 1.5rem;">
                        <h5 style="color: white; margin: 0; font-weight: 600;">
                            <i class="fas fa-exclamation-triangle me-2"></i>Danger Zone
                        </h5>
                    </div>
                    <div class="card-body" style="padding: 2rem;">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
/* Custom form styling to match website theme */
.form-control {
    border: 2px solid #e2e8f0;
    border-radius: 0.75rem;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    transition: all 0.2s ease-in-out;
    background-color: #f8fafc;
}

.form-control:focus {
    border-color: #3b82f6;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-label {
    color: #374151;
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border: none;
    border-radius: 0.75rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px 0 rgba(59, 130, 246, 0.4);
}

.btn-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    border-radius: 0.75rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.3);
}

.btn-success:hover {
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px 0 rgba(16, 185, 129, 0.4);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border: none;
    border-radius: 0.75rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
    box-shadow: 0 4px 14px 0 rgba(239, 68, 68, 0.3);
}

.btn-danger:hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    transform: translateY(-1px);
    box-shadow: 0 6px 20px 0 rgba(239, 68, 68, 0.4);
}

.alert {
    border: none;
    border-radius: 0.75rem;
    padding: 1rem 1.5rem;
}

.alert-success {
    background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
    color: #065f46;
    border-left: 4px solid #10b981;
}

.alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
    border-left: 4px solid #ef4444;
}
</style>
@endsection