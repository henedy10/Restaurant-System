<div>
    @if($number == 1)
        <form wire:submit="save">
            @csrf
            <div class="hour-row row g-2 align-items-end">
                <div class="col-12 col-md-3">
                    <label class="accent">From Day <span class="text-danger">*</span></label>
                    <select class="form-select bg-dark text-white" wire:model="from_day">
                        <option value="" selected>          Choose Day      </option>
                        <option value="Friday">             Friday          </option>
                        <option value="Saturday">           Saturday        </option>
                        <option value="Sunday">             Sunday          </option>
                        <option value="Monday">             Monday          </option>
                        <option value="Tuesday">            Tuesday         </option>
                        <option value="Wednesday">          Wednesday       </option>
                        <option value="Thursday">           Thursday        </option>
                    </select>
                    <span class="text-danger">@error('from_day') {{ $message }} @enderror</span>
                </div>
                <div class="col-12 col-md-3">
                    <label class="accent">To Day</label>
                    <select class="form-select bg-dark text-white" wire:model="to_day">
                        <option value="" selected>          Choose Day   </option>
                        <option value="Friday">             Friday       </option>
                        <option value="Saturday">           Saturday     </option>
                        <option value="Sunday">             Sunday       </option>
                        <option value="Monday">             Monday       </option>
                        <option value="Tuesday">            Tuesday      </option>
                        <option value="Wednesday">          Wednesday    </option>
                        <option value="Thursday">           Thursday     </option>
                    </select>
                    <span class="text-danger">@error('to_day') {{ $message }} @enderror</span>
                </div>
                <div class="col-6 col-md-2">
                    <label class="accent">From Time <span class="text-danger">*</span></label>
                    <input type="time" class="form-control bg-dark text-white" wire:model="from_time">
                    <span class="text-danger">@error('from_time') {{ $message }} @enderror</span>
                </div>
                <div class="col-6 col-md-2">
                    <label class="accent">To Time <span class="text-danger">*</span></label>
                    <input type="time" class="form-control bg-dark text-white" wire:model="to_time">
                    <span class="text-danger">@error('to_time') {{ $message }} @enderror</span>
                </div>
                <div class="col-12 col-md-2 d-flex gap-2 justify-content-start justify-content-md-end mt-3 mt-md-0">
                    <button type="button"
                            wire:click="removePeriod"
                            class="btn btn-outline-danger btn-sm px-3"
                            title="Delete Period">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-success btn-sm px-3"
                            title="Save Period">
                        Save
                    </button>
                </div>
            </div>
        </form>
    @endif

    <div class="d-flex gap-2 mb-3 mt-2">
        @if ($number == 0)
            <button type="button" wire:click="addPeriod" class="btn btn-gold btn-sm">Add New Period</button>
            <button type="button" wire:click="deleteAll"  class="btn btn-danger btn-sm" onclick="confirm('⚠️ Are you sure you want to delete all records?') || event.stopImmediatePropagation()" >Delete All</button>
        @endif
    </div>
</div>
