<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Popover_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @link      ...
 *
 */

// ------------------------------------------------------------------------

if (!function_exists('generate_popover_content')) {
	function generate_popover_content($vdb) {
			return "<div>
					<p><strong>Author: {$vdb['Penulis']}</strong></p>
					<p><strong>Publisher: {$vdb['Penerbit']}</strong></p>
					<p><strong>Published: " . date("l, d F Y", strtotime($vdb['TahunTerbit'])) . "</strong></p>
					<p><strong>Category: {$vdb['NamaKategori']}</strong></p>
			</div>";
	}
}

// ------------------------------------------------------------------------

/* End of file Popover_helper.php */
/* Location: ./application/helpers/Popover_helper.php */
