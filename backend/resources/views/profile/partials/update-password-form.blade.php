<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">
                <i class="fas fa-lock me-2" style="color: #6b7280;"></i>Current Password
            </label>
            <div class="position-relative">
                <input type="password" 
                       id="update_password_current_password" 
                       name="current_password" 
                       class="form-control pe-5" 
                       autocomplete="current-password"
                       placeholder="Enter your current password">
                <button type="button" 
                        class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-1" 
                        style="border: none; background: none; color: #6b7280;"
                        onclick="togglePasswordVisibility('update_password_current_password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @if($errors->updatePassword->get('current_password'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->updatePassword->get('current_password') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label">
                <i class="fas fa-key me-2" style="color: #10b981;"></i>New Password
            </label>
            <div class="position-relative">
                <input type="password" 
                       id="update_password_password" 
                       name="password" 
                       class="form-control pe-5" 
                       autocomplete="new-password"
                       placeholder="Enter your new password">
                <button type="button" 
                        class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-1" 
                        style="border: none; background: none; color: #6b7280;"
                        onclick="togglePasswordVisibility('update_password_password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @if($errors->updatePassword->get('password'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->updatePassword->get('password') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif
            <small class="text-muted">
                <i class="fas fa-info-circle me-1"></i>
                Password must be at least 8 characters long and include a mix of letters, numbers, and symbols.
            </small>
        </div>

        <!-- Confirm New Password -->
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">
                <i class="fas fa-check-double me-2" style="color: #f59e0b;"></i>Confirm New Password
            </label>
            <div class="position-relative">
                <input type="password" 
                       id="update_password_password_confirmation" 
                       name="password_confirmation" 
                       class="form-control pe-5" 
                       autocomplete="new-password"
                       placeholder="Confirm your new password">
                <button type="button" 
                        class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-1" 
                        style="border: none; background: none; color: #6b7280;"
                        onclick="togglePasswordVisibility('update_password_password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->updatePassword->get('password_confirmation') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Save Button and Status -->
        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-shield-alt me-2"></i>Update Password
            </button>

            @if (session('status') === 'password-updated')
                <div class="alert alert-success py-2 px-3 mb-0" 
                     x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)">
                    <small>
                        <i class="fas fa-check-circle me-1"></i>Password updated successfully!
                    </small>
                </div>
            @endif
        </div>
    </form>
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
</script>