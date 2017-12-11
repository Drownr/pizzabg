<html>
	<head>
		<title> Pizzerie Bergamo </title>
		<link href="stile.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
			//Compongo la richiesta all'API e decodifico il JSON che mi viene mandato come risposta
			
			$richiesta="https://api.foursquare.com/v2/venues/search?v=20161016&query=pizzeria&limit=10&intent=checkin&client_id=SOZFHCIYYBRT5N12PQSOO5KHIOOZFCHM3UUDMD4ML4ITBJXR&client_secret=D2BJCFPUBGW5YQJQXFHQFA0TQK4X4EKXTV330APEPON2M5XJ&near=bergamo";
			$curl = curl_init() or die(curl_error());
			curl_setopt($curl, CURLOPT_URL, $richiesta);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$risposta = curl_exec($curl) or die(curl_error());
			$rispostaDec = json_decode($risposta);
		?>
		<div align='center'>
			
			<div class="table-title">
				<h3> Pizzerie vicine a Bergamo </h3>
			</div>
			
			<table class="table-fill">
				<thead>
					<tr>
						<th class="text-left">Nome</th>
						<th class="text-left">Latitudine</th>
						<th class="text-left">Longitudine</th>
					</tr>
				</thead>
				<tbody class="table-hover">
				<?php
					for($i=0; $i < 10; $i++)
					{
				?>
						<tr>
							<td class="text-left">
								<?php echo ($rispostaDec->response->venues[$i]->name); ?>
							</td>
							<td class="text-left">
								<?php echo ($rispostaDec->response->venues[$i]->location->lat); ?>
							</td>
							<td class="text-left">
								<?php echo ($rispostaDec->response->venues[$i]->location->lng); ?>
							</td>
						</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>