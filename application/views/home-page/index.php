<!DOCTYPE html>
<html>
<head>
	<title>İsim Oluşturucu</title>
	<?php $this->load->view('shareds/head'); ?>
</head>
<body>
		<?php $this->load->view('shareds/navbar'); ?>
		<div class="container mt-5" align="center">
			<ul class="list">
				<?php foreach($names as $name): ?>
					<li><?= $name->name ?></li>
				<?php endforeach; ?>
			</ul>
			<table class="table fixed-bottom">
				<tr class="table-info">
					<th scope="row">Listele</th>
					<td>
						<select class="form-control" id="filterByGender" action="<?= base_url('Home/filter') ?>">
							<option selected disabled>Cinsiyet Seçin</option>
							<option value="E">Sadece Erkek İsimleri</option>
							<option value="K">Sadece Kadın İsimleri</option>
							<option value="U">Sadece Unisex İsimleri</option>
						</select>
					</td>
					<td>
						<input 
							getAllAction="<?= base_url('Home/get_all') ?>"
							action="<?= base_url('Home/filter') ?>" 
							id="filterByCount" 
							type="number" 
							class="form-control" placeholder="Sayı" />
					</td>
					<td>
						<button 
						class="btn btn-light" 
						id="createNewButton" 
						getAllaction="<?= base_url('Home/get_all') ?>">Yeniden Oluştur</button>
					</td>
				</tr>
			</table>
		</div>
		<?php $this->load->view('shareds/script'); ?>
	</body>
	</html>