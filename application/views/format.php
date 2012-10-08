<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="' . base_url() . 'submit/c_form/form_zinc_ors_inventory' . '" >
	<!-- form for collecting inventory status information -->
	<h3 align="center"> ZINC &amp; ORS INVENTORY STATUS</h3>
	<p align="center">
		ZINC AND ORS MAPPING
	</p>
	<section class="block">
		<section class="column">
			<section class="row2">
				<section class="left">
					<label>Date:</label>
				</section>
				<section class="right">
					<input type="date" name="facilityDateOfInventory" id="facilityDateOfInventory" readonly="readonly" class="autoDate" placeholder="click for date"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Name:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityName" id="facilityName"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Facility Contact Person:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityContactPerson" id="facilityContactPerson"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Drugs Dispensed From</label>
				</section>
				<section class="right">
					<input type="text" name="facilityZincOrsDispensedFrom" id="facilityZincOrsDispensedFrom"/>
				</section>
			</section>
		</section>
		<section class="column" style="margin-bottom:30px">
			<section class="row2">
				<section class="left">
					<label>District:</label>
				</section>
				<section class="right">
					<select name="facilityDistrict" id="facilityDistrict">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectDistricts . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>County:</label>
				</section>
				<section class="right">
					<select name="facilityCounty" id="facilityCounty">
						<option value="" selected="selected">Select One</option>
						' . $this -> selectCounties . '
					</select>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Telephone Contact:</label>
				</section>
				<section class="right">
					<input type="text" name="facilityTelephone" id="facilityTelephone" maxlength="15"/>
				</section>
			</section>
			<section class="row2">
				<section class="left">
					<label>Email:</label>
				</section>
				<section class="right">
					<input type="email" name="facilityEmail" id="facilityEmail" maxlength="100"/>
					<input type="hidden"  name="facilityMFC" id="facilityMFC"/>
				</section>
			</section>
		</section>
	</section>
	<section class="tab-title">
		<a class="awesome blue large MCH">MCH</a>
		<a class="awesome blue large PEDS">PEDS Wards</a>
		<a class="awesome blue large OPD">OPD</a>
		<a class="awesome blue large Pharmacy">Pharmacy</a>
		<a class="awesome blue large Stores">Stores</a>
		<a class="awesome blue large Others">Others</a>
	</section>
	
	<section class="tab MCH">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>
	<section class="tab PEDS"  style="display:none">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>
	<section class="tab OPD"  style="display:none">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>
	<section class="tab Pharmacy"  style="display:none">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>
	<section class="tab Stores" style="display:none">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>
	<section class="tab Others" style="display:none">
		<h3 align="center"> Zinc and ORS Stock at Hand (In Pharmacy) Assessment</h3>
		<p style="text-align: center" style="color:red">
			Indicate the quantities of the Zinc &ORS available in this facility at the following units
		</p>

		<table>
			<thead>
				<tr>
					<td style="color:#872300">Zinc Sulphate 20mg</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Tablets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<tr class="clonable zinc">
				<td width="144">
				<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
				</td>
				<td width="144">
				<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_1">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_1" value="Add a Batch" width="auto"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_1" value="Remove Batch" width="auto"/>
			</tr>
		</table>

		<h3 align="center"> Low-Osmolarity Oral Rehydration Salts (ORS):</h3>
		<table>
			<thead>
				<tr>
					<td style="color:#872300;font-weight:bold">Oral Rehydration Salts (ORS)</td>
				</tr>
				<tr>

					<td width="144">Batch No</td>
					<td width="144">Quantities at Hand (Sachets)</td>
					<td width="144">Date Supplied to Facility</td>
					<td width="144">Supplier</td>
					<td width="144">Expiry Date</td>
					<td width="144">Comments</td>

				</tr>
			</thead>
			<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
			<tr class="clonable ors">
				<td width="144">
				<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>
				<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
				</td>
				<td width="144">
				<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
				</td>
				<td width="144">
				<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
				</td>
			</tr>
			<tr id="formbuttons_2">
				<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
				<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
			</tr>
		</table>

	</section>

	<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
	<section class="block">
		<section class="column">
			<section class="row-title">
				<section class="left">
					ASPECTS
				</section>
				<section class="right" style="float:right">
					<section class="col">
						YES
					</section>
					<section class="col">
						NO
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> Are dehydrated children rehydrated at this facility? </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
					</section>
					<section class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> Does the facility have a designated location for oral rehydration ?</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
					</section>
					<section class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
					</section>
				</section>
			</section>
			<section class="row hide" style="display:none">
				<section class="left" >
					<label> If Yes, where is this location within the facility?</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="text" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</section>
				</section>
			</section>
		</section>
	</section>

	<h3 align="center"> State the availability &amp; Quantities of the following Equipment at the ORT Corner-(Assessor should ensure the interviewee responds to each of the questions). </h3>
	<section class="block">

		<table id="tableEquipmentList">
			<tr class="row2">
				<input type="button" id="editEquipmentListTopButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/>
			</tr>
			<tr>
				<thead>
					<td width="144">Equipment Name</td>
					<td width="144">Yes/No</td>
					<td width="144">Total Equipment Quantities</td>
					<td width="144">Who supplied the supplies to the facility? (respond by item)</td>
					<td width="144">Is there a budget for replacement of the missing, stolen or Broken ORT Corner equipment in the Current *AOP/QIP?</td>
				</thead>
			</tr>

			<tr class="row2" id="tr_1">
				<td width="144"><label>Tea spoons </label>
				<input type="hidden"  name="equipCode_1" id="equipCode_1" value="EQP01" />
				</td>
				<td width="144">
				<select name="equipAvailable_1" id="equipAvailable_1" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_1" id="equipQuantity_1" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_1" id="equipSupplier_1" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_1" id="equipBudgetPresent_1" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_2">
				<td width="144"><label>Table spoons </label>
				<input type="hidden"  name="equipCode_2" id="equipCode_2" value="EQP02" />
				</td>
				<td width="144">
				<select name="equipAvailable_2" id="equipAvailable_2" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_2" id="equipQuantity_2" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_2" id="equipSupplier_2" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_2" id="equipBudgetPresent_2" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_3">
				<td width="144"><label>Stirring spoon </label>
				<input type="hidden"  name="equipCode_3" id="equipCode_3" value="EQP03" />
				</td>
				<td width="144">
				<select name="equipAvailable_3" id="equipAvailable_3" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_3" id="equipQuantity_3" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_3" id="equipSupplier_3" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_3" id="equipBudgetPresent_3" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_4">
				<td width="144"><label>Plastic buckets (with lids for infection prevention) </label>
				<input type="hidden"  name="equipCode_4" id="equipCode_4" value="EQP04" />
				</td>
				<td width="144">
				<select name="equipAvailable_4" id="equipAvailable_4" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_4" id="equipQuantity_4" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_4" id="equipSupplier_4" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_4" id="equipBudgetPresent_4" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_5">
				<td width="144"><label> Buckets – for storing cups, spoons </label>
				<input type="hidden"  name="equipCode_5" id="equipCode_5" value="EQP05" />
				</td>
				<td width="144">
				<select name="equipAvailable_5" id="equipAvailable_5" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_5" id="equipQuantity_5" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_5" id="equipSupplier_5" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_5" id="equipBudgetPresent_5" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_6">
				<td width="144"><label> Plastic cups (50-100mls) </label>
				<input type="hidden"  name="equipCode_6" id="equipCode_6" value="EQP06" />
				</td>
				<td width="144">
				<select name="equipAvailable_6" id="equipAvailable_6" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_6" id="equipQuantity_6" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_6" id="equipSupplier_6" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_6" id="equipBudgetPresent_6" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_7">
				<td width="144"><label> Plastic cups (101-200mls) </label>
				<input type="hidden"  name="equipCode_7" id="equipCode_7" value="EQP07" />
				</td>
				<td width="144">
				<select name="equipAvailable_7" id="equipAvailable_7" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_7" id="equipQuantity_7" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_7" id="equipSupplier_7" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_7" id="equipBudgetPresent_7" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_8">
				<td width="144"><label> Plastic cups (201mls-499mls) </label>
				<input type="hidden"  name="equipCode_8" id="equipCode_8" value="EQP08" />
				</td>
				<td width="144">
				<select name="equipAvailable_8" id="equipAvailable_8" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_8" id="equipQuantity_8" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_8" id="equipSupplier_8" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_8" id="equipBudgetPresent_8" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_9">
				<td width="144"><label> Plastic cups (500mls) </label>
				<input type="hidden"  name="equipCode_9" id="equipCode_9" value="EQP09" />
				</td>
				<td width="144">
				<select name="equipAvailable_9" id="equipAvailable_9" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_9" id="equipQuantity_9" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_9" id="equipSupplier_9" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_9" id="equipBudgetPresent_9" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_10">
				<td width="144"><label> 1 litre Calibrated measuring jars </label>
				<input type="hidden"  name="equipCode_10" id="equipCode_10" value="EQP10" />
				</td>
				<td width="144">
				<select name="equipAvailable_10" id="equipAvailable_10" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_10" id="equipQuantity_10" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_10" id="equipSupplier_10" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_10" id="equipBudgetPresent_10" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_11">
				<td width="144"><label> Table Trays </label>
				<input type="hidden"  name="equipCode_11" id="equipCode_11" value="EQP11" />
				</td>
				<td width="144">
				<select name="equipAvailable_11" id="equipAvailable_11" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_11" id="equipQuantity_11" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_11" id="equipSupplier_11" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_11" id="equipBudgetPresent_11" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_12">
				<td width="144"><label> Wash Basins </label>
				<input type="hidden"  name="equipCode_12" id="equipCode_12" value="EQP12" />
				</td>
				<td width="144">
				<select name="equipAvailable_12" id="equipAvailable_12" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_12" id="equipQuantity_12" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_12" id="equipSupplier_12" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_12" id="equipBudgetPresent_12" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_13">
				<td width="144"><label> Water heating equipment,(e.g..hot plate/Meko ) </label>
				<input type="hidden"  name="equipCode_13" id="equipCode_13" value="EQP13" />
				</td>
				<td width="144">
				<select name="equipAvailable_13" id="equipAvailable_13" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_13" id="equipQuantity_13" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_13" id="equipSupplier_13" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_13" id="equipBudgetPresent_13" class="cloned ">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_14">
				<td width="144"><label> Hot plate-Electric/Solar powered </label>
				<input type="hidden"  name="equipCode_14" id="equipCode_14" value="EQP14" />
				</td>
				<td width="144">
				<select name="equipAvailable_14" id="equipAvailable_14" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_14" id="equipQuantity_14" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_14" id="equipSupplier_14" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_14" id="equipBudgetPresent_14" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_15">
				<td width="144"><label> Heater- Gas powered </label>
				<input type="hidden"  name="equipCode_15" id="equipCode_15" value="EQP15" />
				</td>
				<td width="144">
				<select name="equipAvailable_15" id="equipAvailable_15" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_15" id="equipQuantity_15" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_15" id="equipSupplier_15" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_15" id="equipBudgetPresent_15" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_16">
				<td width="144"><label> Charcoal or Firewood  stove/Heater </label>
				<input type="hidden"  name="equipCode_16" id="equipCode_16" value="EQP16" />
				</td>
				<td width="144">
				<select name="equipAvailable_16" id="equipAvailable_16" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_16" id="equipQuantity_16" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_16" id="equipSupplier_16" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_16" id="equipBudgetPresent_16" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_17">
				<td width="144"><label> Paraffin Stove/Heater </label>
				<input type="hidden"  name="equipCode_17" id="equipCode_17" value="EQP17" />
				</td>
				<td width="144">
				<select name="equipAvailable_17" id="equipAvailable_17" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_17" id="equipQuantity_17" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_17" id="equipSupplier_17" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_17" id="equipBudgetPresent_17" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_18">
				<td width="144"><label> Sufurias  with a Lid (14 inch) </label>
				<input type="hidden"  name="equipCode_18" id="equipCode_18" value="EQP18" />
				</td>
				<td width="144">
				<select name="equipAvailable_18" id="equipAvailable_18" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_18" id="equipQuantity_18" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_18" id="equipSupplier_18" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_18" id="equipBudgetPresent_18" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_19">
				<td width="144"><label> Waste Container </label>
				<input type="hidden"  name="equipCode_19" id="equipCode_19" value="EQP19" />
				</td>
				<td width="144">
				<select name="equipAvailable_19" id="equipAvailable_19" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_19" id="equipQuantity_19" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_19" id="equipSupplier_19" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_19" id="equipBudgetPresent_19" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_20">
				<td width="144"><label> Wall Clock /Timing device </label>
				<input type="hidden"  name="equipCode_20" id="equipCode_20" value="EQP20" />
				</td>
				<td width="144">
				<select name="equipAvailable_20" id="equipAvailable_20" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_20" id="equipQuantity_20" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_20" id="equipSupplier_20" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_20" id="equipBudgetPresent_20" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_21">
				<td width="144"><label> Table- for mixing ORS </label>
				<input type="hidden"  name="equipCode_21" id="equipCode_21" value="EQP21" />
				</td>
				<td width="144">
				<select name="equipAvailable_21" id="equipAvailable_21" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_21" id="equipQuantity_21" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_21" id="equipSupplier_21" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_21" id="equipBudgetPresent_21" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_22">
				<td width="144"><label> Benches/chair(s) </label>
				<input type="hidden"  name="equipCode_22" id="equipCode_22" value="EQP22" />
				</td>
				<td width="144">
				<select name="equipAvailable_22" id="equipAvailable_22" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_22" id="equipQuantity_22" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_22" id="equipSupplier_22" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_22" id="equipBudgetPresent_22" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_23">
				<td width="144"><label> Water Storage Container ( at least 40lts)- With Tap </label>
				<input type="hidden"  name="equipCode_23" id="equipCode_23" value="EQP23" />
				</td>
				<td width="144">
				<select name="equipAvailable_23" id="equipAvailable_23" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_23" id="equipQuantity_23" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_23" id="equipSupplier_23" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_23" id="equipBudgetPresent_23" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_24">
				<td width="144"><label> Water Storage Container ( at least 40lts)- Without Tap </label>
				<input type="hidden"  name="equipCode_24" id="equipCode_24" value="EQP24" />
				</td>
				<td width="144">
				<select name="equipAvailable_24" id="equipAvailable_24" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_24" id="equipQuantity_24" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_24" id="equipSupplier_24" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_24" id="equipBudgetPresent_24" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_25">
				<td width="144"><label> Locally available measuring containers – e.g. cooking fat Tins. </label>
				<input type="hidden"  name="equipCode_25" id="equipCode_25" value="EQP25" />
				</td>
				<td width="144">
				<select name="equipAvailable_25" id="equipAvailable_25" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_25" id="equipQuantity_25" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_25" id="equipSupplier_25" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_25" id="equipBudgetPresent_25" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_26">
				<td width="144"><label> Weighing scale </label>
				<input type="hidden"  name="equipCode_26" id="equipCode_26" value="EQP26" />
				</td>
				<td width="144">
				<select name="equipAvailable_26" id="equipAvailable_26" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_26" id="equipQuantity_26" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_26" id="equipSupplier_26" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_26" id="equipBudgetPresent_26" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_27">
				<td width="144"><label> Hand Washing Facility/Point e.g. tippy taps. </label>
				<input type="hidden"  name="equipCode_27" id="equipCode_27" value="EQP27" />
				</td>
				<td width="144">
				<select name="equipAvailable_27" id="equipAvailable_27" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_27" id="equipQuantity_27" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_27" id="equipSupplier_27" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_27" id="equipBudgetPresent_27" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_28">
				<td width="144"><label> Safe water source </label>
				<input type="hidden"  name="equipCode_28" id="equipCode_28" value="EQP28" />
				</td>
				<td width="144">
				<select name="equipAvailable_28" id="equipAvailable_28" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_28" id="equipQuantity_28" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_28" id="equipSupplier_28" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_28" id="equipBudgetPresent_28" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_29">
				<td width="144"><label> Thermometer </label>
				<input type="hidden"  name="equipCode_29" id="equipCode_29" value="EQP29" />
				</td>
				<td width="144">
				<select name="equipAvailable_29" id="equipAvailable_29" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_29" id="equipQuantity_29" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_29" id="equipSupplier_29" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_29" id="equipBudgetPresent_29" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<tr class="row2" id="tr_30">
				<td width="144"><label> MUAC Tape </label>
				<input type="hidden"  name="equipCode_30" id="equipCode_30" value="EQP30" />
				</td>
				<td width="144">
				<select name="equipAvailable_30" id="equipAvailable_30" class="cloned left-combo">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
				<td width="144">
				<input type="number"  name="equipQuantity_30" id="equipQuantity_30" class="cloned fromZero" maxlength="6"/>
				</td>
				<td width="144">
				<input type="text"  name="equipSupplier_30" id="equipSupplier_30" class="cloned"  maxlength="45"/>
				</td>
				<td width="144">
				<select name="equipBudgetPresent_30" id="equipBudgetPresent_30" class="cloned">
					<option value="" selected="selected">Select One</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select></td>
			</tr>
			<!--tr class="row2">
			<input type="button" id="editEquipmentListBottomButton" name="editEquipmentList" class="awesome myblue medium" value="Edit List"/-->
			</tr>
		</table>
	</section>

</form>