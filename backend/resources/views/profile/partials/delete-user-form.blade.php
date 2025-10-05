<section class="space-y-6">
    <div class="mb-4">
        <p class="text-muted mb-3">
            <i class="fas fa-exclamation-triangle me-2" style="color: #ef4444;"></i>
            <strong>Warning:</strong> Once your account is deleted, all of its resources and data will be permanently deleted. 
            Before deleting your account, please download any data or information that you wish to retain.
        </p>
        
        <div class="alert alert-warning">
            <h6 class="mb-2">
                <i class="fas fa-database me-2"></i>Data that will be permanently deleted:
            </h6>
            <ul class="mb-0 small">
                <li>Profile information and medical license details</li>
                <li>Adverse event reports you've submitted</li>
                <li>Account preferences and settings</li>
                <li>All associated medical data and records</li>
            </ul>
        </div>
    </div>

    <button type="button" 
            class="btn btn-danger"
            data-bs-toggle="modal" 
            data-bs-target="#confirmDeleteModal">
        <i class="fas fa-trash-alt me-2"></i>Delete Account
    </button>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; border-radius: 1rem;">
                <div class="modal-header" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); border-radius: 1rem 1rem 0 0;">
                    <h5 class="modal-title text-white" id="confirmDeleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirm Account Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 2rem;">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 50%; margin-bottom: 1rem;">
                            <i class="fas fa-user-times" style="font-size: 2rem; color: #dc2626;"></i>
                        </div>
                        <h6 class="mb-3" style="color: #1f2937;">Are you absolutely sure?</h6>
                        <p class="text-muted small mb-4">
                            This action cannot be undone. This will permanently delete your account and remove all your data from our servers.
                        </p>
                    </div>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="delete_password" class="form-label">
                                <i class="fas fa-lock me-2" style="color: #ef4444;"></i>
                                Enter your password to confirm deletion
                            </label>
                            <div class="position-relative">
                                <input type="password" 
                                       id="delete_password" 
                                       name="password" 
                                       class="form-control pe-5" 
                                       placeholder="Enter your password"
                                       required>
                                <button type="button" 
                                        class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-1" 
                                        style="border: none; background: none; color: #6b7280;"
                                        onclick="togglePasswordVisibility('delete_password', this)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @if($errors->userDeletion->get('password'))
                                <div class="alert alert-danger mt-2 py-2">
                                    @foreach($errors->userDeletion->get('password') as $error)
                                        <small>{{ $error }}</small>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt me-2"></i>Delete My Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Show modal if there are validation errors
@if($errors->userDeletion->isNotEmpty())
document.addEventListener('DOMContentLoaded', function() {
    var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    modal.show();
});
@endif
</script>