@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    @if(Auth::user()->type == 1)
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Instructors</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $count_instructors }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                <i class="fas fa-users opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Borrowed Assets</p>
                <h5 class="font-weight-bolder mb-0">
                {{ $count_assets }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow text-center border-radius-md">
                <i class="fas fa-warehouse opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Reports</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $count_reports }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                <i class="fas fa-flag opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Rooms (On Class)</p>
                <h5 class="font-weight-bolder mb-0">
                {{ $count_rooms }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                <i class="fas fa-house-user opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(Auth::user()->type == 2)
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Reports</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $count_reports }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow text-center border-radius-md">
                <i class="fas fa-flag opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Rooms (On Class)</p>
                <h5 class="font-weight-bolder mb-0">
                {{ $count_rooms }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                <i class="fas fa-house-user opacity-10"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
  <div class="row mt-4">
    @if(Auth::user()->type == 2)
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            
              <div class="d-flex flex-column h-100">
                <form id="set-schedule" action="">
                @csrf
                    <h6>Class Time Schedule</h6>
                    @if($count_sched > 0)
                      <div class="badge badge-sm bg-gradient-success">On Class</div><br>
                    @endif
                    <label for="">Date</label>

                    @php  date_default_timezone_set("Asia/Singapore");   @endphp
                    <input type="" class="form-control" value="{{ date('F d, Y') }}" readonly/>

                    @if($count_sched > 0)
                      @foreach($schedule as $sched)
                        @if($sched->userid == Auth::user()->userid && $sched->status == 1)
                          <label for="" class="mt-2">From</label>
                          <input type="text" class="form-control" value="{{ date('h:i A', strtotime($sched->date_from)) }}" readonly/>

                          <label for="" class="mt-2">To</label>
                          <input type="text" class="form-control" value="{{ date('h:i A', strtotime($sched->date_to)) }}" readonly/>
                        
                          <label for="" class="mt-2">Room</label>
                          <input type="text" class="form-control" value="{{ $sched->Room->room }}" readonly/>
                        @endif
                      @endforeach
                    @endif
                   
                    @if($count_sched == 0)
                    
                      <label for="" class="mt-2">From</label>
                      <input type="time" class="form-control" name="date_from" required/>

                      <label for="" class="mt-2">To</label>
                      <input type="time" class="form-control" name="date_to" required/>

                      <label for="" class="mt-2">Room</label>
                      <select name="room" class="form-select" id="" required>
                          <option value="">Select Room</option>
                        @foreach ($rooms as $ro)
                          <option value={{ $ro->id }}>{{ $ro->room }}</option>
                        @endforeach
                      </select>
                      
                      <button class="btn bg-gradient-info mt-4">Set Schedule</button>
                    @endif
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    @endif 

    <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Class Logs</h5>
                            @php date_default_timezone_set("Asia/Singapore");  @endphp
                            <p class="mt-2 text-sm"><span class="me-2 text-success"><i class="fas fa-calendar-day"></i></span>{{ date('M d, Y') }}</p>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 table-hover">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                                        No.
                                    </th>
                                    <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="20%">
                                        Instructor
                                    </th>
                                    <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Room
                                    </th>
                                    <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Time
                                    </th>
                                    <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $cnt = 1; date_default_timezone_set("Asia/Singapore");  @endphp

                                @foreach($schedule as $sched)
                                  @if(date('Y-m-d', strtotime($sched->date_from)) == date('Y-m-d'))

                                  @php
                                    $datetime1 = new DateTime();
                                    $datetime2 = new DateTime($sched->date_to);
                                    $interval = $datetime1->diff($datetime2);
                                  @endphp

                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $sched->User->Instructor->name }}</p>
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bolder mb-0">{{ $sched->Room->room }}</p>
                                        </td>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ date('h:i A', strtotime($sched->date_from)) }} - {{ date('h:i A', strtotime($sched->date_to)) }}</p>
                                        </td>
                                        <td class="ps-4">
                                          @if($datetime1 <= $datetime2)
                                          <div class="badge badge-s text-xxs bg-gradient-success d-inline me-2"><i class="fas fa-toggle-on"></i></div>
                                          @if($interval->format('%h') >= 1 ) 
                                            <span class="text-xs fw-bolder mb-0">{{ $interval->format('%h')."h ".$interval->format('%i')."m" }}</span>
                                          @else
                                          <span class="text-xs fw-bolder mb-0">{{ $interval->format('%i')."m" }}</span>
                                          @endif
                                          @else
                                          <div class="badge badge-s text-xxs bg-gradient-secondary d-inline me-2"><i class="fas fa-toggle-on"></i></div>
                                          @endif
                                        </td>
                                    </tr>
                                    @php $cnt += 1; @endphp
                                    @endif
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  </div>

@endsection
@push('dashboard')



  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
@endpush

