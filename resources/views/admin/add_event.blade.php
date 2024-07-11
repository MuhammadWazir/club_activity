<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 600px;">
            <h3 class="text-center mb-4">Add Event</h3>
            <form method="POST" action="{{ route('admin.event.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Event description">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="Event category">
                </div>

                <div class="mb-3">
                    <label for="date_from" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="date_from" name="date_from">
                </div>

                <div class="mb-3">
                    <label for="date_to" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="date_to" name="date_to">
                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="number" class="form-control" id="cost" name="cost">
                </div>
                <label for="guide" class="form-label">Guide</label>
                <select id="guideDropdown" class="form-control" name="guide">
                    <option value="">Select guide</option>
                    @foreach($guides as $guide)
                    <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Event status">
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-layout>
