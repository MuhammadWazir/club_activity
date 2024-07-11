<x-layout>
<div class="d-flex justify-content-center align-items-center"style="height: 100%;">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 600px;">
            <h3 class="text-center mb-4">Register Admin</h3>
    <form method="POST" action="{{ route('admin.registerAdmin.handle') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="">Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="mb-3">
            <label for="joining_date" class="form-label">Joining Date</label>
            <input type="date" class="form-control" id="joining_date" name="joining_date" required>
        </div>

        <div class="mb-3">
            <label for="mobile_number" class="form-label">Mobile Number</label>
            <input type="tel" class="form-control" id="mobile_number" name="mobile_number" placeholder="Your mobile number" required>
        </div>

        <div class="mb-3">
            <label for="emergency_number" class="form-label">Emergency Number</label>
            <input type="tel" class="form-control" id="emergency_number" name="emergency_number" placeholder="Your emergency contact number" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="profession" class="form-label">Profession</label>
            <input type="text" class="form-control" id="profession" name="profession" placeholder="Your profession" required>
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Your nationality" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</x-layout>
