<div >
    @if($number == 1)
        <div class="hour-row row g-2 align-items-end">
            <div class="col-12 col-md-3">
                <label class="form-label accent">From Day</label>
                <select class="form-select bg-dark text-white" name="day[]">
                    <option>Friday</option>
                    <option>Saturday</option>
                    <option>Sunday</option>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                </select>
            </div>
            <div class="col-12 col-md-3">
                <label class="form-label accent">To Day</label>
                <select class="form-select bg-dark text-white" name="day[]">
                    <option>Friday</option>
                    <option>Saturday</option>
                    <option>Sunday</option>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label accent">From Time</label>
                <input type="time" class="form-control bg-dark text-white" name="time_from[]" required>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label accent">To Time</label>
                <input type="time" class="form-control bg-dark text-white" name="time_to[]" required>
            </div>
            <div class="col-12 col-md-2 text-start text-md-end d-flex">
                <button type="button" wire:click="removePeriod" class="btn btn-danger" title="Delete Period">Delete</button>
                <button type="button" class="btn btn-success" title="Save Period">Save</button>
            </div>
        </div>
    @endif

    <div class="d-flex gap-2 mb-3 mt-2">
        @if ($number == 0)
            <button  type="button" wire:click="addPeriod" class="btn btn-gold btn-sm">Add New Period</button>
        @endif
        {{-- <button  type="button" wire:click="removeAll" class="btn btn-danger btn-sm">Delete All</button> --}}
    </div>
</div>
