<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant System — Admin UI</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{ --gold: #D4AF37; --bg: #0b0b0b; }
        body{ background: var(--bg); color: #fff; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; }
        .card-dark{ background: #070707; border: 1px solid rgba(212,175,55,0.12); }
        .accent{ color: var(--gold); }
        .btn-gold{ background: linear-gradient(180deg, rgba(212,175,55,1), rgba(180,140,40,0.95)); color:#0b0b0b; border: none; }
        .form-control:focus{ box-shadow: 0 0 0 0.2rem rgba(212,175,55,0.12); border-color: rgba(212,175,55,0.8); }
        .hour-row{ border-left: 3px solid rgba(212,175,55,0.12); padding-left: 12px; margin-bottom:10px; }
        .small-muted{ color: rgba(255,255,255,0.6); }
        .remove-hour{ color: #ff6b6b; cursor: pointer; }
        @media (min-width: 992px){ .form-label{ font-weight:600; } }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div>
                <div class="card card-dark shadow-sm border border-warning">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="mb-0 accent">Restaurant System</h3>
                            <a href="#" class="btn btn-sm btn-outline-warning">⬅ Previous Page</a>
                        </div>

                        <form>
                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Phone Number</label>
                                    <input type="tel" class="form-control bg-dark text-white" id="phone" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label accent">Email Address</label>
                                    <input type="email" class="form-control bg-dark text-white" id="email" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label accent">Address</label>
                                <textarea class="form-control bg-dark text-white" id="address" rows="2"></textarea>
                            </div>

                            <hr class="border-secondary">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="mb-0 accent">Opening Hours</h5>
                                <small class="text-danger">* Add more than one period per day if necessary.</small>
                            </div>

                            <div id="hoursList">
                                <!-- نموذج صف مواعيد افتراضي -->
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
                                    <div class="col-12 col-md-2 text-start text-md-end">
                                        <button type="button" class="btn btn-danger w-100" title="حذف الفترة">Delete</button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mb-3 mt-2">
                                <button id="addHourBtn" type="button" class="btn btn-gold btn-sm">Add New Period</button>
                                <button id="clearHoursBtn" type="button" class="btn btn-danger btn-sm">Delete All</button>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-gold">Save</button>
                                <button type="reset" class="btn btn-outline-light">Cancle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // منطق بسيط لإضافة/حذف صفوف مواعيد
        (function(){
            const hoursList = document.getElementById('hoursList');
            const addBtn = document.getElementById('addHourBtn');
            const clearBtn = document.getElementById('clearHoursBtn');
            let index = 1;

            function makeHourRow(idx){
                const div = document.createElement('div');
                div.className = 'hour-row row g-2 align-items-end';
                div.setAttribute('data-index', idx);
                div.innerHTML = `
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
                        <div class="col-12 col-md-2 text-start text-md-end">
                            <button type="button" class="btn btn-danger w-100" title="حذف الفترة">Delete</button>
                        </div>
                        </div>
                    </div>
                `;
                return div;
            }

            addBtn.addEventListener('click', ()=>{
                const row = makeHourRow(index++);
                hoursList.appendChild(row);
            });

            clearBtn.addEventListener('click', ()=>{
                // اترك صف واحد افتراضي
                hoursList.innerHTML = '';
                hoursList.appendChild(makeHourRow(0));
                index = 1;
            });

            // حذف عند الضغط على زر الحذف داخل hoursList
            hoursList.addEventListener('click', (e)=>{
                if(e.target && e.target.classList.contains('remove-btn')){
                const row = e.target.closest('.hour-row');
                if(row) row.remove();
                }
            });
        })();
    </script>
</body>
</html>
