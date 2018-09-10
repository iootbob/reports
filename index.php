<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 
</head>

<style>
  	body
  	{
  		font-family: "Nirmala UI", helvetica, sans-serif;
  		margin: 0; 
  		padding: 0;
  		color: #464646
  	}
  	.title_icon
  	{
  		width: 45px;float: left;margin: 0px 15px 0px 15px
  	}
  	.table_container
  	{
  		width: 90%;background-color: #ffffff;
  		border: 1px solid #c8c8c8;
  	}
  	.table_title_container
  	{
  		height:90px;
  		width: 100%;
  		background: linear-gradient(to bottom right, #39a395,#94dffc);
  		padding-top:45px;
  		padding-left: 10px;
  		margin-bottom: 0;
  	}
  	.table_title
  	{
  		font-size:35px;
  		margin:0px;
  		font-family: "Nirmala UI", helvetica;
  		font-weight: 100;
  		color: #ffffff;
  		padding-top: 5px;
  		padding-left: 15px
  	}
  	.table_cell
  	{
  		border: 1px solid #c8c8c8;
  		text-align: center;
  	}
  	.currency
    {
        text-align: right;
    }
</style>

<body style="background-color:#e6e6e6">

    <div id="reports">
		<div>
			<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
				<tbody>
					<tr style="height: 40px;">
						<td style="width: 40px"></td>
						<td></td>
						<td style="width: 40px"></td>
					</tr>
					<tr>
						<td></td>
						<td align="center" bgcolor="" style="height:300px;background: linear-gradient(to bottom , #1f3e6c,#48b2a3);border-top-left-radius: 30px;border-top-right-radius: 30px">
							<img src="cid:pb_cropped" style="width: 60px;">
							<p style="font-size:40px;margin:0px;font-family: ' . 'Arial Black'.', Arial;font-weight: 800;color: #ffffff">MANAGEMENT REPORTS</p>
							<p style="color: #ffffff;margin: 0px;">As of August 28, 2018 3:31 PM</p>
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
    </div>
<!-- NEW CLIENTS -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
						<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:new_client" style="">
												<p class="table_title" style="">New Clients</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="new_clients" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr style="background-color: #F0F0F0">
														<th colspan="7" class="table_cell">June</th>
													</tr>
													<tr style="background-color: #F0F0F0">
														<th class="table_cell">Date Signed</th>
														<th class="table_cell">Client</th>
														<th class="table_cell">Seats</th>
														<th class="table_cell">Type of Contract</th>
														<th class="table_cell">Duration of Agreement</th>
														<th class="table_cell">Contract Expiration</th>
														<th class="table_cell">MRR</th>
														
													</tr>
												</thead>
													 
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END NEW CLIENTS -->

<!-- LOST CLIENTS -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:client_lost" style="">
												<p class="table_title" style="">Lost Clients</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="lost_clients" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr style="background-color: #F0F0F0">
														<th colspan="6" class="table_cell">June</th>
													</tr>
													<tr>
														<th class="table_cell">Separation Date</th>
														<th class="table_cell">Client</th>
														<th class="table_cell">Type of Contract</th>
														<th class="table_cell">MRR</th>
													</tr>
												</thead>

											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END LOST CLIENTS -->

<!-- NEW EMPLOYEES -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:new_employee" style="">
												<p class="table_title" style="">New Employees</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
										<table id="new_employees_pb" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container" style="margin-top: 20px">
												<thead style="background-color: #F0F0F0">
													<tr>
														<th class="table_cell" colspan="7">PB Core</th>
													</tr>
													<tr>
														<th class="table_cell">Name</th>
														<th class="table_cell">Position Title</th>
														<th class="table_cell">Company</th>
														<th class="table_cell">Immediate Supervisor</th>
														<th class="table_cell">Employment Status</th>
														<th class="table_cell">Salary</th>
														<th class="table_cell">Onboarding Date</th>
														
													</tr>
												</thead>
												
											</table>

											<table id="new_employees_non_pb" align="center" style="margin-top:20px" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead style="background-color: #F0F0F0">
													<tr >
														<th  class="table_cell" colspan="7">PB Core</th>
													</tr>
													<tr>
														<th class="table_cell">Name</th>
														<th class="table_cell">Position Title</th>
														<th class="table_cell">Company</th>
														<th class="table_cell">Immediate Supervisor</th>
														<th class="table_cell">Employment Status</th>
														<th class="table_cell">Salary</th>
														<th class="table_cell">Onboarding Date</th>
														 
														
													</tr>
												</thead>
												 
											</table>

										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END NEW EMPLOYEES -->

<!--  LOST EMPLOYEES-->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:new_employee" style="">
												<p class="table_title" style="">Lost Employees</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="lost_employees" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr>
														<th  class="table_cell">Name</th>
														<th class="table_cell">Position Title</th>
														<th class="table_cell">Immediate Supervisor</th>
														<th class="table_cell">Separation Date</th>
														<th class="table_cell">Company</th>
													</tr>
												</thead>
												             
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END LOST EMPLOYEES -->

<!-- SALES DISTRIBUTION -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:client_price_range " style="">
												<p class="table_title" style="">Active Clients Sales Distribution</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="sales_distribution" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr>
														<th class="table_cell">Price Range</th>
														<th class="table_cell">MSA</th>
														<th class="table_cell">OSA</th>
														<th class="table_cell">MRR</th>
													</tr>
												</thead>
												 												
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END SALES DISTRIBUTION -->

<!-- CLIENT/EMPLOYEE by INDUSTRY -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:client_info" style="">
												<p class="table_title" style="">Client / Employee by Industry</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="client_employee_by_industry" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr>
														<th class="table_cell">Industry</th>
														<th class="table_cell">No. of Clients</th>
														<th class="table_cell">No. of Employees</th>
													</tr>
												</thead>
												 
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END CLIENT/EMPLOYEE by INDUSTRY -->

<!-- CLIENTS REVENUE BY COUNTRY -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:client_revenue" style="">
												<p class="table_title" style="">Clients Revenue by Country</p>
											</div>
										</td>
									</tr>
									<tr >
										<td style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											<table id="clients_revenue_by_country" align="center" border="0" cellpadding="10" cellspacing="0" class="table_container">
												<thead>
													<tr>
														<th class="table_cell">Country</th>
														<th class="table_cell">No. of Clients</th>
														<th class="table_cell">MRR</th>
													</tr>
												</thead>
												 
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END CLIENTS REVENUE BY COUNTRY -->

<!-- COLLECTIONS -->
	<div>
		<table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" style="border:0;">
			<tbody>
				<tr>
					<td style="width: 40px"></td>
					<td></td>
					<td style="width: 40px"></td>
				</tr>
				<tr>
					<td></td>
					<td bgcolor="#ffffff">
					<div style="margin: 10px;">
							<table style="width: 100%; overflow: hidden;" cellspacing="0" cellpadding="0">
								<tbody>
									<tr style="padding: 0">
										<td>
											<div class="table_title_container">
												<img class="title_icon" src="cid:collection" style="">
												<p class="table_title" style="">Collections</p>
											</div>
										</td>
									</tr>
									<tr >
										<td id="collections" style="border: 1px solid #c8c8c8;border-top: 0;padding: 20px 0px 20px 0px;">
											
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td> 
				</tr>
			</tbody>
		</table>
	</div>
<!-- END COLLECTIONNS -->

     
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
     
	
	let reports = {
		ajaxSetup : function(){
			$.ajaxSetup(function(){
				cache: true
			});
		},
		getNewClients : function(){
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getNewClients",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#new_clients").append(res); 	
				// console.log(res)
			})
			},10);
		},
		getLostClients : function(){

			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getLostClients",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#lost_clients").append(res); 
			})
			},20);
		},
		getNewEmployeesNonPB : function(){
			
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getNewEmployeesNonPB",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#new_employees_non_pb").append(res); 
			})
			},30);
		},
		getNewEmployeesPB : function(){
			
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getNewEmployeesPB",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#new_employees_pb").append(res); 
			})
			},30);
		},
		getLostEmployees : function(){
			
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getLostEmployees",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#lost_employees").append(res); 
			})
			},40);
		},
		getSalesDistribution : function(){
			
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getSalesDistribution",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#sales_distribution").append(res); 
			})
			},50);
		},
		getIndustry : function(){
			
			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getIndustry",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#client_employee_by_industry").append(res); 
			})
			},60);
		},
		getCountry : function(){

			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getCountry",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#clients_revenue_by_country").append(res); 
				
			})
			},70);
		},
		getCollection : function(){

			setTimeout(function(){
				$.ajax({
				url : "./fc_Reports.php?action=getCollection",
				cache: false,
				type : "GET",
				// contentType : "text/html"
			}).done(function(res){
				$("#collections").append(res); 
				// console.log(res);
			})
			},80);
		},
		sendEmail : function(){
			// let styleHtml = document.getElementsByTagName('style')[0];
			let style = `<!DOCTYPE html><html><head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style type="text/css">${$("style").html()}</style></head>`;
			let content = "<body style='background-color: #e6e6e6;'>" + $("body").html() + "</body></html>" ;

			$.ajax({
				url : "./mail.php",
				type : "POST",
				data : {html : style + content}
			}).done(function(res){
				// console.log(res)
			}) 
		}
		,
		init : function(){
			let reports_array = [
				this.getNewClients(),
				this.getLostClients(),
				this.getNewEmployeesNonPB(),
				this.getNewEmployeesPB(),
				this.getLostEmployees(),
				this.getSalesDistribution(),
				this.getIndustry(),
				this.getCountry(),
				this.getCollection()
				];

			$.when(...reports_array).then(function(){
				// reports.sendEmail();
				
				setTimeout(function(){
					this.sendEmail();
					// console.log($("#reports").html());
				}.bind(this) ,2000);
			}.bind(this));

		}
	}

	reports.init();

     

    </script>
</body>
</html>