<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style>
			body {
				line-height: 1.5;
				direction: ltr;
				background-color: #f8f9fa;
				color: #7b7b7b;
				font-family: Tahoma,Arial, Helvetica, sans-serif;
				padding: 15px;
			}
			.link {
				text-decoration: underline;
				color: inherit !important;
			}
			h1{
				font-family: Arial, Helvetica, sans-serif;
			}
			.btn {
				padding: 12px 24px;
				color: #ffffff;
				display: inline-block;
				text-decoration: none;
				font-size: 16px;
				line-height: 1.25em;
				border-color: #4385f4;
				background-color: #4385f4;
				border-radius: 34px;
				border-width: 1px;
				border-style: solid;
			}
			.subtitle {
				font-size: 14px;
				opacity: 0.8;
			}
		</style>
	</head>
	<body style="direction:rtl;">
		<div style="padding: 16px; background-color: #fff; border: 1px solid #d8d8d8; border-radius: 8px; max-width: 800px; margin: 0 auto">
			<div style="max-width: 800px; margin: 0 auto 16px auto">
				<table style="width:100%">
					<tr>
						<td>
							<a target="_blank" href="https://dimensionsgroup.sa/">
								<img height="64"  src="https://certificate.dimensionsgroup.sa/admin/assets/images/logo/logo.png" />
							</a>
						</td>
						<td style="text-align:left">


							
						</td>
					</tr>
				</table>
			</div>
			<h1 style="font-size: 24px; text-align: center"></h1>
			
			السيد {{$details['name'] ?? ''}}
			<br>
			<br>

تحية طيبة وبعد ،،
يرجى الإطلاع على الشهادة الخاصة فيك المقدمة من خلال مجموعة أبعاد المعوفة والخاصة بدورة 
<b>{{$details['course_name'] ?? ''}}</b>
<br><br>
من خلال الرابط التالي 
<br>
{!!$details['link'] ?? ''!!}
	<br>
				<br>
					<br>
						<br>
وفي حال وجودة اي استفسارات او مشاكل لا تتردد بالتواصل معنا من خلال الرقم التالي 966539223000
			<br>
				<br>
					<br>
						<br>
			
						<footer class="main-footer m-0">
  
  </footer>

		</div>
		<div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


		</div>
	</body>
</html>


