<?php
	// biodata
	$biodata = $this->biodata_model->get_by_id(array( 'id' => $_GET['biodata_id'] ));
	
	// summary
	$param_summary['tahun'] = $_GET['tahun'];
	$param_summary['biodata_id'] = $_GET['biodata_id'];
	$summary = $this->skp_summary_model->get_by_id($param_summary);
	
	// realisasi
	$param_realisasi['tahun'] = $_GET['tahun'];
	$param_realisasi['biodata_id'] = $_GET['biodata_id'];
	$realisasi = $this->skp_realisasi_model->get_array($param_realisasi);
	
	// tugas tambahan
	$param_tugas_tambahan['tahun'] = $_GET['tahun'];
	$param_tugas_tambahan['biodata_id'] = $_GET['biodata_id'];
	$array_tugas_tambahan = $this->skp_tugas_tambahan_model->get_array($param_tugas_tambahan);
	
	// kreativitas
	$param_kreativitas['tahun'] = $_GET['tahun'];
	$param_kreativitas['biodata_id'] = $_GET['biodata_id'];
	$array_kreativitas = $this->skp_kreativitas_model->get_array($param_kreativitas);
	
	// nilai capaian
	$param_nilai_capaian['tahun'] = $_GET['tahun'];
	$param_nilai_capaian['biodata_id'] = $_GET['biodata_id'];
	$nilai_capaian = $this->skp_realisasi_model->get_total_nilai_capaian($param_nilai_capaian);
?>

<style>
table.border {background-color:#000;}
table.border td,th,caption{background-color:#fff}
</style>

<div style="text-align: center; font-weight: bold; font-size: 14px;">
	<div>PENILAIAN CAPAIAN SASARAN KERJA</div>
	<div>PEGAWAI NEGERI SIPIL</div>
</div>

<div style="padding: 20px 0 0 20px;">
<div style="padding: 10px 0; font-size: 12px;">
	Jangka Waktu Penilaian <?php echo $summary['tanggal_pembuatan_text']; ?> s.d. <?php echo $summary['tanggal_penilaian_text']; ?>
</div>
<table class="border" style="font-size: 10px; width: 1000px;">
	<tr>
		<td style="width: 25px; text-align: center;" rowspan="2">NO</td>
		<td style="width: 225px; text-align: center;" rowspan="2">I. Kegiatan Tugas  Jabatan</td>
		<td style="width: 50px; text-align: center;" rowspan="2">AK</td>
		<td style="width: 250px; text-align: center;" colspan="4">TARGET</td>
		<td style="width: 50px; text-align: center;" rowspan="2">AK</td>
		<td style="width: 250px; text-align: center;" colspan="4">REALISASI</td>
		<td style="width: 75px; text-align: center;" rowspan="2">PERHITUNGAN</td>
		<td style="width: 75px; text-align: center;" rowspan="2">NILAI CAPAIAN</td>
	</tr>
	<tr>
		<td style="width: 70px; text-align: center;">Kuant / Output</td>
		<td style="width: 65px; text-align: center;">Kual / Mutu</td>
		<td style="width: 70px; text-align: center;">Waktu</td>
		<td style="width: 65px; text-align: center;">Biaya</td>
		<td style="width: 70px; text-align: center;">Kuant / Output</td>
		<td style="width: 65px; text-align: center;">Kual / Mutu</td>
		<td style="width: 70px; text-align: center;">Waktu</td>
		<td style="width: 65px; text-align: center;">Biaya</td>
	</tr>
	<?php $counter = 1; ?>
	<?php foreach ($realisasi as $row) { ?>
	<tr>
		<td style="text-align: center;"><?php echo $counter; ?></td>
		<td><?php echo $row['jenis_skp_title']; ?></td>
		<td style="text-align: center;"><?php echo $row['target_ak']; ?></td>
		<td>
			<table style="width: 70;">
				<tr>
					<td style="width: 30; text-align: center;"><?php echo $row['target_kuant_nilai']; ?></td>
					<td style="width: 40;"><?php echo $row['jenis_skp_satuan']; ?></td>
				</tr>
			</table>
		</td>
		<td style="text-align: center;"><?php echo $row['target_kual']; ?></td>
		<td style="text-align: center;"><?php echo $row['target_waktu_nilai'].' '.$row['target_waktu_satuan']; ?></td>
		<td style="text-align: center;"><?php echo $row['target_biaya']; ?></td>
		<td style="text-align: center;">0</td>
		<td>
			<table style="width: 70;">
				<tr>
					<td style="width: 30; text-align: center;"><?php echo $row['real_kuant']; ?></td>
					<td style="width: 40;"><?php echo $row['jenis_skp_satuan']; ?></td>
				</tr>
			</table>
		</td>
		<td style="text-align: center;"><?php echo $row['real_kual']; ?></td>
		<td style="text-align: center;"><?php echo $row['real_waktu']; ?></td>
		<td style="text-align: center;"><?php echo $row['real_biaya']; ?></td>
		<td style="text-align: center;"><?php echo $row['perhitungan']; ?></td>
		<td style="text-align: center;"><?php echo $row['nilai_capaian']; ?></td></tr>
	<?php $counter++; ?>
	<?php } ?>
	<tr>
		<td>&nbsp;</td>
		<td>II. TUGAS TAMBAHAN DAN KREATIVITAS/UNSUR PENUNJANG :</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center;">1</td>
		<td>(tugas tambahan)</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align: center;" colspan="4">
			<?php if (isset($array_tugas_tambahan[0])) { ?>
				<?php echo $array_tugas_tambahan[0]['title']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;">
			<?php if (isset($array_tugas_tambahan[0])) { ?>
				<?php echo $array_tugas_tambahan[0]['perhitungan']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;" rowspan="2">
			<?php $nilai_temp = @$array_tugas_tambahan[0]['nilai_capaian'] + @$array_tugas_tambahan[1]['nilai_capaian']; ?>
			<?php echo $nilai_temp; ?>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td>(tugas tambahan)</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align: center;" colspan="4">
			<?php if (isset($array_tugas_tambahan[1])) { ?>
				<?php echo $array_tugas_tambahan[1]['title']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;">
			<?php if (isset($array_tugas_tambahan[1])) { ?>
				<?php echo $array_tugas_tambahan[1]['perhitungan']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">2</td>
		<td>(kreatifitas)</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align: center;" colspan="4">
			<?php if (isset($array_kreativitas[0])) { ?>
				<?php echo $array_kreativitas[0]['title']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;">
			<?php if (isset($array_kreativitas[0])) { ?>
				<?php echo $array_kreativitas[0]['perhitungan']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;" rowspan="2">
			<?php $nilai_temp = @$array_kreativitas[0]['nilai_capaian'] + @$array_kreativitas[1]['nilai_capaian']; ?>
			<?php echo $nilai_temp; ?>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td>(kreatifitas)</td>
		<td>&nbsp;</td>
		<td colspan="4">&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align: center;" colspan="4">
			<?php if (isset($array_kreativitas[1])) { ?>
				<?php echo $array_kreativitas[1]['title']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
		<td style="text-align: center;">
			<?php if (isset($array_kreativitas[1])) { ?>
				<?php echo $array_kreativitas[1]['perhitungan']; ?>
			<?php } else { ?>
				&nbsp;
			<?php } ?>
		</td>
	</tr>
	<tr>
		<td colspan="13" rowspan="2" style="font-size: 14px; text-align: center;">Nilai Capaian SKP</td>
		<td style="text-align: center;"><?php echo $nilai_capaian; ?></td>
	</tr>
	<tr>
		<td style="text-align: center;"><?php echo get_string_score($nilai_capaian); ?></td>
	</tr>
</table>
</div>

<div style="text-align: center; font-size: 12px; padding: 30px 0 0 0;">
	<div style="float: left; width: 70%;">
		<div>&nbsp;</div>
	</div>
	<div style="float: left; width: 25%;">
		<div>Malang, <?php echo $summary['tanggal_penilaian_text']; ?></div>
		<div>Pegawai Negeri Sipil Yang Dinilai</div>
		<div style="padding: 25px 0;">&nbsp;</div>
		<div><?php echo $biodata['nama_gelar']; ?></div>
		<div><?php echo $biodata['nip']; ?></div>
	</div>
	<div style="clear: both;"></div>
</div>