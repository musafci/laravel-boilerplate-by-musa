@if(!empty($row->logo))
    <img src="https://d1gpq2c3n7cisg.cloudfront.net/{{$row->logo}}"
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
