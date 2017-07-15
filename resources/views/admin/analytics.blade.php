@extends('layouts.app-semanticui')
@section('content')
    <div class="ui grid sixteen wide">
        <div class="sixteen wide column" align="center">
            <div class="ui buttons fluid" align="center">
                <a href="?period=<?php if($period == '7') { echo "week"; }elseif($period == '30') { echo "month"; }elseif($period == '365') { echo "year"; } ?>&start=<?php echo $prev->format('m/d/Y'); ?>" class="ui left labeled icon button default mini hiddenOnMobile" style="border-right:#ccc 1px solid;">
                    <i class="left chevron icon"></i>
                    Prev
                </a>
                <a href="?period=<?php if($period == '7') { echo "week"; }elseif($period == '30') { echo "month"; }elseif($period == '365') { echo "year"; } ?>&start=<?php echo $prev->format('m/d/Y'); ?>" class="ui left icon button default mini hiddenOnDesktop hiddenOnTablet" style="border-right:#ccc 1px solid;border-radius:4px 0px 0px 4px;">
                    <i class="left chevron icon"></i>
                </a>
                <a href="/admin/analytics?period=week&start=<?php echo $prev->copy()->addDays($period)->format('m/d/Y'); ?>" class="ui button default mini <?php if($period == '7') { echo "active"; } ?>" style="border-right:#ccc 1px solid;" >Week</a>
                <a href="/admin/analytics/?period=month&start=<?php echo $prev->copy()->addDays($period)->format('m/d/Y'); ?>" class="ui button default mini <?php if($period == '30') { echo "active"; } ?>" style="border-right:#ccc 1px solid;">Month</a>
                <a href="/admin/analytics/?period=year&start=<?php echo $prev->copy()->addDays($period)->format('m/d/Y'); ?>" class="ui button default mini <?php if($period == '365') { echo "active"; } ?>" style="border-right:#ccc 1px solid;">Year</a>
                <a href="?period=<?php if($period == '7') { echo "week"; }elseif($period == '30') { echo "month"; }elseif($period == '365') { echo "year"; } ?>&start=<?php echo $next->format('m/d/Y'); ?>" class="ui right icon button default mini hiddenOnDesktop hiddenOnTablet <?php if(!$next->copy()->addDay()->isPast()) { echo "disabled"; } ?>"  style="border-radius:0px 4px 4px 0px;">
                    <i class="right chevron icon"></i>
                </a>
                <a href="?period=<?php if($period == '7') { echo "week"; }elseif($period == '30') { echo "month"; }elseif($period == '365') { echo "year"; } ?>&start=<?php echo $next->format('m/d/Y'); ?>" class="ui right labeled icon button default mini hiddenOnMobile <?php if(!$next->copy()->addDay()->isPast()) { echo "disabled"; } ?>">
                    <i class="right chevron icon"></i>
                    Next
                </a>
            </div>
            <div class="ui raised basic segment module" align="center" >
                <p class="header" style="margin-bottom:0px;padding-bottom:0px;">{{ $trafficTitle }}</p>
                {!! $traffic->render() !!}
            </div>
        </div>
    </div>
    <div class="ui grid sixteen wide" >
        <div class="eight wide column">
            <div class="ui raised basic segment module" align="center" style="height:100%;">
                <p class="header" style="margin-bottom:0px;padding-bottom:0px;">Visitors by Country</p>
                {!! $countries->render() !!}
            </div>
        </div>


        <div class="eight wide column">
            <div class="ui raised basic segment module" align="center" style="height:100%;">
                <div align="center" style="line-height:25px;">
                    <p class="header">Stats</p>
                    <table class="ui selectable table">
                        <tbody>
                        <tr>
                            <td>Total Number of Sessions</td>
                            <td class="right aligned">{{ round($sessions) }}</td>
                        </tr>
                        <tr>
                            <td>Avgerage Session Duration</td>
                            <td class="right aligned">{{ round($avgSessionDuration/60) }} Minutes</td>
                        </tr>
                        <tr>
                            <td>Total Session Time</td>
                            <td class="right aligned">{{ round($totalSessionTime/3600) }} Hours</td>
                        </tr>
                        <tr>
                            <td>Bounce Rate</td>
                            <td class="right aligned">{{ round($bounceRate) }}%</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection