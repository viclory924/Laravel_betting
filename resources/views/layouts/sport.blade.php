<!DOCTYPE html>
<html lang="{{ \App::getLocale() }}" class="sport-page">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Casino | Sport</title>
    @include('partials.favicon')
    <link rel="stylesheet" href="{{ asset('css/style.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v=5.1') }}">
</head>
<body>


<div id="all">

    @include('partials.header', ['active' => 'sport'])

    <div id="page-bg">
        {{--<iframe class="sport-iframe">--}}
            @if($agent->isMobile())
                <script type="text/javascript" src="https://msports-itainment.biahosted.com/staticResources/betinactionApi.js"></script>
            @else
                <script type="text/javascript" src="https://sports-itainment.biahosted.com/staticResources/betinactionApi.js"></script>
            @endif
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div id="SetPageButtons">
                            {{--<button onClick="betinactionAPI.setPagePrelive()">Prelive</button>--}}
			    @if(!$agent->isMobile())
				<!--<button onClick="betinactionAPI.setPageLive()">Live</button>-->
				{{--<a class="btn sportsbook-button" href="http://sports-itainment.biahosted.com/Generic/live.aspx?skinid=leprecon">Live</a>--}}
				
                            @endif
                            {{--<button onClick="betinactionAPI.setPageVfl()">Vfl</button>--}}
                        </div>

                        <div class="content__games1 clearfix1" style="height:auto !important;">
                            <div id="BIA_client_container"></div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function getSelectionsList() {
                    var eventIds = String(document.getElementById("InputeventId").value).split(',');
                    betinactionAPI.getMarkets(eventIds);
                }

                function onSelectionButtonClick(btn) {
                    betinactionAPI.setSelection(btn.dataset.selectionid);
                }

                var parseQuery = function (queryString) {
                    if (((typeof queryString) !== 'string') || (queryString.length === 0)) {
                        return {}
                    }
                    var leadingSymbols = ['?', '#']
                    if (leadingSymbols.indexOf(queryString[0]) > -1) {
                        queryString = queryString.substr(1)
                    } else {
                        return {}
                    }
                    queryString = queryString.replace(/[\]]/g, '\\$&')
                    var params = {}
                    var queryParts = decodeURI(encodeURI(queryString)).split(/&/g)
                    for (var a = queryParts, i = 0, ii = a.length; i < ii; i++) {
                        var val = a[i]
                        var parts = val.split('=')
                        if ((parts.length >= 1) && (parts[0] !== '')) {
                            var key = null
                            if (parts.length === 2) {
                                key = parts[1]
                            }
                            params[parts[0]] = key
                        }
                    }
                    return params
                }


                var biaOptions = parseQuery(window.location.hash);
                biaOptions.walletcode  = "{{ env('APP_SPORTSBOOK_WALLET_CODE') }}";
                biaOptions.token  = "{{ $player_token }}";
                biaOptions.skinid = 'leprecon';
                biaOptions.page = 'prelive';
                biaOptions.getMarketsCallback = function (result) {
                    if(result.length !== 0){
                        var resultString = JSON.stringify(result);
                        var htmlString = '';
                        for (var eventIdx = 0; eventIdx < result.length; eventIdx++) {
                            var event = result[eventIdx];
                            htmlString += '<br><h3>'+event['EventName'] + '</h3>';
                            var markets = event['Markets'];
                            for (var marketIdx = 0; marketIdx < markets.length; marketIdx++) {
                                var market = markets[marketIdx];
                                htmlString += '<h4>' + market['Name'] + '</h4><table>';
                                var selectionList = market['SelectionList'];
                                for (var selectionIdx = 0; selectionIdx < selectionList.length; selectionIdx++) {
                                    var selection = selectionList[selectionIdx];
                                    htmlString += '<tr><td style="padding-right: 7px;">' + selection['SelectionName'] + ':</td> <td style="text-align: right;"><b>' + selection['Price'] + '</b></td> <td><button id="addSelectionIdBtn" onclick = "onSelectionButtonClick(this)" data-selectionId = "' + selection['SelectionId'] + '">Set</button></td></tr>';
                                }
                            }
                            htmlString += '</table>';
                        }

                        document.getElementById('SelectionsList').innerHTML =  htmlString;
                    }

                };

                biaOptions.setSelectionCallback = function () {
                    document.getElementById('SelectionResult').innerHTML = 'Added to betslip';
                };
                biaOptions.loadCallback = function () {
                    if (betinactionAPI.initParams.full) {
                        document.getElementById("SetPageButtons").style.display = "block";
                        //document.getElementById("SelectionIdForm").style.display = "none";
                    }
                    else {
                        document.getElementById("SetPageButtons").style.display = "none";
                    }
                };
                biaOptions.insufficientBalanceCallback = function () {
                    alert('Insufficient Balance')
                };
                biaOptions.intervalDelay = 100;
                biaOptions.hashchangeCallback = function (hash) {
                    history.pushState(undefined, undefined, hash || '#');
                };
                biaOptions.logoffCallback = function(logoffData){
                    console.log(logoffData);
                };

                var betinactionAPI = new BetinactionAPI("#BIA_client_container", biaOptions);


            </script>
        {{--</iframe>--}}
    </div>


    @include('partials.footer')
</div>

<div id="page-overlay"></div>


<div id="popup">
    <div class="container">

        @include('partials.notification')

        @include('partials.provider-popup')

        @if(\Auth::user())
            @include('partials.profile-popup')
        @else
            @include('partials.registration-popup')
            @include('partials.recover-password-popup')
            @include('partials.login-popup')
        @endif

        @include('partials.deposit-popup')
        @include('partials.assistance-popup')
    </div>
</div>

@include('partials.included_scripts')

<script type="text/javascript">

$(document).ready(function(){
	
	var intervalBalance = setInterval(getBalance, 5000);
	
});

var getBalance = function(){
		
		
		$.post('/player/get-balance',function(result){
			
			var result = JSON.parse(result);
			//console.log(result);
			if( result["status"] == 1 )
			{	
				
				$('.sum').html(result["result"]["balance"]+' <span class="currency">'+result["result"]["currency"]+'</span>');	
				//console.log(result["result"]["balance"]);
			}
			else{
					//console.log("cant update");
			}
			
			
		});
	
		}
	
</script>

</body>
</html>
