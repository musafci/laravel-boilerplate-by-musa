@if(!empty($row->logo))
    <img src="{{asset($row->logo ?? 'images/not_found.png')}}"
         style="
                width: 90px;
                height: 90px;
                background-color: lightskyblue;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: auto;
                padding: 15px;
                border-radius: 10px;
         "
    />
@endif
