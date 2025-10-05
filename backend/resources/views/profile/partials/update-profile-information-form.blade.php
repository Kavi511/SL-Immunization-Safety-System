<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="fas fa-user me-2" style="color: #3b82f6;"></i>Full Name
            </label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   class="form-control" 
                   value="{{ old('name', $user->name) }}" 
                   required 
                   autofocus 
                   autocomplete="name"
                   placeholder="Enter your full name">
            @if($errors->get('name'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->get('name') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Medical License Number Field -->
        @if($user->medical_license_no)
        <div class="mb-3">
            <label for="medical_license_no" class="form-label">
                <i class="fas fa-id-card me-2" style="color: #10b981;"></i>Medical License Number
            </label>
            <input type="text" 
                   id="medical_license_no" 
                   name="medical_license_no" 
                   class="form-control" 
                   value="{{ old('medical_license_no', $user->medical_license_no) }}" 
                   autocomplete="off"
                   placeholder="Enter your medical license number">
            @if($errors->get('medical_license_no'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->get('medical_license_no') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif
        </div>
        @endif

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">
                <i class="fas fa-envelope me-2" style="color: #f59e0b;"></i>Email Address
            </label>
            <input type="email" 
                   id="email" 
                   name="email" 
                   class="form-control" 
                   value="{{ old('email', $user->email) }}" 
                   required 
                   autocomplete="username"
                   placeholder="Enter your email address">
            @if($errors->get('email'))
                <div class="alert alert-danger mt-2 py-2">
                    @foreach($errors->get('email') as $error)
                        <small>{{ $error }}</small>
                    @endforeach
                </div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2">
                    <small>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Your email address is unverified.
                        <button form="send-verification" 
                                class="btn btn-link p-0 text-decoration-underline" 
                                style="font-size: 0.875rem;">
                            Click here to re-send the verification email.
                        </button>
                    </small>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mt-2">
                        <small>
                            <i class="fas fa-check-circle me-1"></i>
                            A new verification link has been sent to your email address.
                        </small>
                    </div>
                @endif
            @endif
        </div>

        <!-- Save Button and Status -->
        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success py-2 px-3 mb-0" 
                     x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)">
                    <small>
                        <i class="fas fa-check-circle me-1"></i>Profile updated successfully!
                    </small>
                </div>
            @endif
        </div>
    </form>
</section>

<!-- Alpine.js for notifications -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>