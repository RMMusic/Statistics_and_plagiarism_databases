<div class="box-body no-padding">
    <div class="row">

        <div class="col-md-12 col-sm-12">
            @foreach($trainings as $nameroom=>$room)
                @if(count($room)>0)
                    <div class="col-sm-12 {{(count($trainings)==1 && count($room)>0)?'col-big-12':'col-md-12 col-big-6'}} ">
                        <div class="text-center text-bold text-green h3">{{Cache::get('rooms')[$nameroom]}}</div>
                        <div class="time-line img-bordered-sm col-md-12 col-xs-12">
                            <div id="pbar_outerdiv_{{$nameroom}}" class="pbar_outerdiv">
                                <div id="pbar_innerdiv_{{$nameroom}}" class="pbar_innerdiv"></div>
                                <div id="pbar_innertext_{{$nameroom}}" class="pbar_innertext"></div>
                            </div>
                        </div>
                        <div class="tickets-accordion">
                            <ul>
                                @foreach($room as $training)

                                    <li id="{{$training['id']}}" class="event-acordion">
                                        <div class="small-box vertical">
                                            <div class="inner">
                                                <h4 class="widget-user-desc text-bold text-center">{{date("H:i", strtotime($training['start']))}}</h4>
                                                <h4 class="widget-user-desc text-bold text-center">{{$training['title']}}</h4>
                                                <h5 class="widget-user-desc details"><a style="color:#fff" href="/training/trainer/{{$training['trainer_id']}}"> Тренер: {{$training['trainer']}} </a></h4>
                                                <h5 class="widget-user-desc details">Клієнтів: {{count($training['clients'])}}</h4>
                                                <h5 class="widget-user-desc details">Оплата Тренеру: later</h4>
                                            </div>
                                            <a href="/training/detail/{{$training['id']}}" class="icon details">
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                            <div class="clients details">
                                                @if(count($training['clients'])>0)
                                                    @foreach($training['clients'] as $client)
                                                        <span class="label label-danger"><a style="color:#fff" href="/clients/{{$client->getTicket->getNameClient->id}}">{{$client->getTicket->getNameClient->name}}</a></span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>