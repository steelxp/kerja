<?php	$array_index_surat = $this->index_surat_model->get_array(array( 'limit' => 100 ));?><?php $this->load->view( 'common/meta', array( 'title' => 'Surat Keluar' ) ); ?><body><?php $this->load->view( 'common/header'); ?><div class="content">	<?php $this->load->view( 'common/sidebar'); ?>	<div class="hide">		<div class="cnt-data"><?php echo json_encode($page_data); ?></div>		<iframe name="iframe_file_surat" src="<?php echo base_url('upload?callback=set_file_surat'); ?>"></iframe>	</div>	  	<div class="mainbar">	    <div class="page-head">			<h2 class="pull-left button-back">Surat Keluar</h2>			<div class="clearfix"></div>		</div>			    <div class="matter"><div class="container">            <div class="row"><div class="col-md-12">								<div class="widget grid-main">					<div class="widget-head">						<div class="pull-left">							<button class="btn btn-info btn-xs btn-add">Tambah</button>						</div>						<div class="widget-icons pull-right">							<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>							<a href="#" class="wclose"><i class="fa fa-times"></i></a>						</div>						<div class="clearfix"></div>					</div>					<div class="widget-content">						<table id="datatable" class="table table-striped table-bordered table-hover">							<thead>								<tr>									<th>No Urut</th>									<th>No Surat</th>									<th>Pengolah</th>									<th>Tujuan</th>									<th>Tanggal Surat</th>									<th class="center">Control</th>								</tr>							</thead>							<tbody></tbody>						</table>						<div class="widget-foot">							<br /><br />							<div class="clearfix"></div> 						</div>					</div>				</div>								<div class="widget hide" id="form-surat">					<div class="widget-head">						<div class="pull-left">Form Surat Keluar</div>						<div class="widget-icons pull-right">							<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>							<a href="#" class="wclose"><i class="fa fa-times"></i></a>						</div>						<div class="clearfix"></div>					</div>										<div class="widget-content">						<div class="padd"><form class="form-horizontal">							<input type="hidden" name="action" value="update" />							<input type="hidden" name="id" value="0" />														<div class="form-group">								<label class="col-lg-2 control-label">No Urut</label>								<div class="col-lg-10">									<input type="text" name="no_urut" class="form-control" placeholder="No Urut" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Index Surat</label>								<div class="col-lg-10">									<select class="form-control" name="index_surat_id">										<?php echo ShowOption(array( 'Array' => $array_index_surat, 'ArrayTitle' => 'title_text' )); ?>									</select>								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">No Surat</label>								<div class="col-lg-10">									<input type="text" name="no_surat" class="form-control" placeholder="No Surat" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Pengolah</label>								<div class="col-lg-10">									<input type="text" name="pengolah" class="form-control" placeholder="Pengolah" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Tujuan</label>								<div class="col-lg-10">									<input type="text" name="tujuan" class="form-control" placeholder="Tujuan" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Tanggal Surat</label>								<div class="col-lg-10">									<div class="input-append datepicker">										<input name="tanggal_surat" type="text" class="form-control dtpicker" placeholder="Tanggal Surat" data-format="dd-MM-yyyy" />										<span class="add-on"><i data-time-icon="fa fa-time" data-date-icon="fa fa-calendar" class="btn btn-info"></i></span>									</div>								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Lampiran</label>								<div class="col-lg-10">									<input type="text" name="lampiran" class="form-control" placeholder="Lampiran" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Perihal</label>								<div class="col-lg-10">									<input type="text" name="perihal" class="form-control" placeholder="Perihal" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">Catatan</label>								<div class="col-lg-10">									<input type="text" name="catatan" class="form-control" placeholder="Catatan" />								</div>							</div>							<div class="form-group">								<label class="col-lg-2 control-label">File Surat</label>								<div class="col-lg-4">									<input type="text" name="file_surat" class="form-control" placeholder="File Surat" />								</div>								<div class="col-lg-2">									<input type="button" class="btn btn-primary btn-browse-file-surat" value="Browse" />									<input type="button" class="btn btn-primary btn-check-file" value="Check" />								</div>							</div>														<hr />							<div class="form-group">								<div class="col-lg-offset-2 col-lg-9">									<button type="submit" class="btn btn-info">Save</button>									<button type="button" class="btn btn-info btn-show-grid">Cancel</button>								</div>							</div>						</form></div>					</div>				</div>  							</div></div>        </div></div>    </div>	<div class="clearfix"></div></div><?php $this->load->view( 'common/footer' ); ?><?php $this->load->view( 'common/library_js'); ?><script>$(document).ready(function() {	var dt = null;	var page = {		show_grid: function() {			$('.grid-main').show();			$('#form-surat').hide();		},		show_form: function() {			$('.grid-main').hide();			$('#form-surat').show();		}	}		// global	$('.btn-show-grid').click(function() {		page.show_grid();	});		// upload	$('.btn-browse-file-surat').click(function() { window.iframe_file_surat.browse() });	set_file_surat = function(p) {		$('#form-surat [name="file_surat"]').val(p.file_name);	}		// grid	var param = {		id: 'datatable', aaSorting: [[0, 'desc']],		source: web.host + 'surat/surat_keluar/home/grid',		column: [ { sClass: "center" }, { }, { }, { }, { }, { bSortable: false, sClass: "center" } ],		callback: function() {			$('#datatable .btn-edit').click(function() {				var raw_record = $(this).siblings('.hide').text();				eval('var record = ' + raw_record);								Func.ajax({ url: web.host + 'surat/surat_keluar/home/action', param: { action: 'get_by_id', id: record.id }, callback: function(result) {					Func.populate({ cnt: '#form-surat', record: result });					$('#form-surat form').valid();					page.show_form();				} });			});						$('#datatable .btn-print').click(function() {				var raw_record = $(this).siblings('.hide').text();				eval('var record = ' + raw_record);				window.open(record.link_print);			});						$('#datatable .btn-delete').click(function() {				var raw_record = $(this).siblings('.hide').text();				eval('var record = ' + raw_record);								Func.form.del({					data: { action: 'delete', id: record.id },					url: web.host + 'surat/surat_keluar/home/action', callback: function() { dt.reload(); }				});			});		}	}	dt = Func.datatable(param);		// form surat	$('.btn-add').click(function() {		page.show_form();		$('#form-surat form')[0].reset();		$('#form-surat [name="id"]').val(0);				// get next no urut		Func.ajax({ url: web.host + 'surat/surat_keluar/home/action', param: { action: 'get_next_no' }, callback: function(result) {			$('#form-surat [name="no_urut"]').val(result.next_no);		} });	});	$('#form-surat form').validate({		rules: {			no_surat: { required: true },			surat_dari: { required: true },			perihal: { required: true },			tanggal_surat: { required: true }		}	});	$('#form-surat form').submit(function(e) {		e.preventDefault();		if (! $('#form-surat form').valid()) {			return false;		}				var param = Func.form.get_value('form-surat');		Func.form.submit({			url: web.host + 'surat/surat_keluar/home/action',			param: param,			callback: function(result) {				dt.reload();				page.show_grid();				$('#form-surat form')[0].reset();			}		});	});});</script></body></html>