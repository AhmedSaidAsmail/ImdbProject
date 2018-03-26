@foreach($list as $val)
    @if(!is_null($val['id']) && isset($val['q']) && ($val['q']=='feature' or  $val['q']=='video'))
        <a href="http://www.imdb.com/title/{{$val['id']}}/">
            <div class="row">
                <div class=" col-xs-1 thumb">
                    <img src="{!! isset($val['i'][0])?getThumb($val['i'][0]):asset('images/no-image.png') !!}}"">
                </div>
                <div class="col-md-11">
                    <h3>{{$val['l']}}
                        <span>{!! isset($val['y'])?"(".$val['y'].")":"" !!}
                            {{--<span class="rating"><i class="fas fa-star"></i> {{getRate($val['id'])}}<span class="divided">/10</span> </span>--}}
                    </span>
                    </h3>
                    <span class="cast"> {!! isset($val['s'])?$val['s']:"" !!}</span>
                </div>
            </div>
        </a>
    @endif
@endforeach
