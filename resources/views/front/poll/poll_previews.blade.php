@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
        <!-- ... Your page top content ... -->
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($poll_data as $item)
                        @if($loop->iteration == 1)
                            @continue
                        @endif
                        @php
                            $total_vote = $item->yes_vote + $item->no_vote;
                            if ($item->yes_vote == 0) {
                                $total_yes_percentage = 0;
                            } else {
                                $total_yes_percentage = ($item->yes_vote * 100) / $total_vote;
                                $total_yes_percentage = ceil($total_yes_percentage);
                            }
                            if ($item->no_vote == 0) {
                                $total_no_percentage = 0;
                            } else {
                                $total_no_percentage = ($item->no_vote * 100) / $total_vote;
                                $total_no_percentage = ceil($total_no_percentage);
                            }
                        @endphp

      <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
        
                        <div class="poll-item">
                            <div class="question">
                               {{$item->question}}
                            </div>
                            <div class="poll-date">
                            @php
                                    $ts = strtotime($item->created_at);
                                    $updated_date = date("Y-F-d", $ts);
                                    @endphp
                                <b>Poll Date:</b> {{$updated_date}}
                            </div>
                            <div class="total-vote">
                                <b>Total Votes:</b> {{$total_vote}}
                            </div>
                            <div class="poll-result">                        
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Yes ({{$total_yes_percentage }})</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" 
                                                    style="width: {{$total_yes_percentage }}%" aria-valuenow="76" aria-valuemin="0" 
                                                    aria-valuemax="100">{{$total_yes_percentage }}%</div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No ({{$total_no_percentage }})</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" 
                                                    style="width: {{$total_no_percentage }}%" aria-valuenow="34" aria-valuemin="0"
                                                     aria-valuemax="100">{{$total_no_percentage }}%</div>
                                                </div>
                                            </td>
                                        </tr>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
        
                        
        
                    </div>
                </div>
            </div>
        </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
