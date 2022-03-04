Hello <i>{{ $demo->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
  
<p><u>Demo object values:</u></p>
  
<div>
<p><b>Demo One:</b>&nbsp;{{ $client_reg->client_reg}}</p>
<p><b>Demo Two:</b>&nbsp;{{ $client_reg }}</p>
</div>
  
<p><u>Values passed by With method:</u></p>
  
<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>
  
Thank You,
<br/>
<i>{{ $client_reg   ->sender }}</i>