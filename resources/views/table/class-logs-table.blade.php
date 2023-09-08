<table class="table align-items-center mb-0 table-hover" id="search-result">
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
        </tr>
    </thead>
    <tbody>
        @php $cnt = 1; date_default_timezone_set("Asia/Singapore");  @endphp

        @foreach($schedule as $sched)
            
            <tr>
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
                </td>
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $sched->User->Instructor->name }}</p>
                </td>
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $sched->Room->room }}</p>
                </td>
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ date('M d, Y', strtotime($sched->date_from)) }} | {{ date('h:i A', strtotime($sched->date_from)) }} - {{ date('h:i A', strtotime($sched->date_to)) }}</p>
                </td>
            </tr>
            @php $cnt += 1; @endphp
           
        @endforeach
        
    </tbody>
</table>