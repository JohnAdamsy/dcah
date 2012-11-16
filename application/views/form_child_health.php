<form name="zinc_ors_inventory" id="zinc_ors_inventory" method="POST" action="" >
	<!-- form for collecting inventory status information -->

	<h3 align="center"> CHILD HEALTH COMMODITIES ASSESSMENT</h3>

	<h3 align="center"> Commodities Assessment </h3>
	<p style="text-align: center;color:#872300">
		Indicate the quantities of the Zinc,ORS,Ciprofloxacin &amp; Metronidazole (Flagyl) available in this facility at the following units

	</p>
	<div id="tabs">
		<ul>
			<li>
				<a href="#tabs-1">MCH</a>
			</li>
			<li>
				<a href="#tabs-2">PEDS WARD</a>
			</li>
			<li>
				<a href="#tabs-3">OPD</a>
			</li>
			<li>
				<a href="#tabs-4">PHARMACY</a>
			</li>
			<li>
				<a href="#tabs-5">STORES</a>
			</li>
			<li>
				<a href="#tabs-6">Others*</a>
			</li>
		</ul>
		<div id="tabs-1" class="tab MCH">

			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>
					<tr></tr>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Tablets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<tr class="clonable zinc">
					<!--td width="144">
					<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
					</td-->
					<td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
					</td>
					<!--td width="144">
					<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
					</td-->
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

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>
		</div>
		<!--close tabs-1-->

		<div id="tabs-2" class="tab PEDS">
			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>

					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Tablets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<tr class="clonable zinc">
					<!--td width="144">
					<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
					</td-->
					<td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
					</td>
					<!--td width="144">
					<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
					</td-->
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

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>
		</div>
		<!--close tabs-2-->

		<div id="tabs-3" class="tab OPD">
			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Tablets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<tr class="clonable zinc">
					<!--td width="144">
					<input type="text"  name="znStockBatchNo_1" id="znStockBatchNo_1" class="cloned" maxlength="10"/>
					</td-->
					<td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="znCommodityName_1" id="znCommodityName_1" value="Zinc Sulphate (20mg) Tablet" />
					</td>
					<!--td width="144">
					<input type="date"  name="znStockDispensedDate_1" id="znStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="znStockSupplier_1" id="znStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="znStockExpiryDate_1" id="znStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="znStockComments_1" id="znStockComments_1" class="cloned" maxlength="255"/>
					</td-->
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

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>

			<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
			<table>
				<thead>
					<tr>

						<!--td width="144">Batch No</td-->
						<td width="144">Quantities at Hand (Sachets)</td>
						<!--td width="144">Date Supplied to Facility</td-->
						<!--td width="144">Supplier</td-->
						<td width="144">Expiry Date</td>
						<!--td width="144">Comments</td-->

					</tr>
				</thead>
				<!--tr><td>Low-Osmolarity Oral Rehydration Salts (ORS): </td></tr-->
				<tr class="clonable ors">
					<!--td width="144">
					<input type="text"  name="orsStockBatchNo_1" id="orsStockBatchNo_1" class="cloned" maxlength="10"/>

					</td-->
					<td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					<input type="hidden"  name="orsCommodityName_1" id="orsCommodityName_1" value="Oral Rehydration Salts (ORS) Sachet" />
					</td>
					<!--td width="144">
					<input type="date"  name="orsStockDispensedDate_1" id="orsStockDispensedDate_1" class="autoDate cloned" readonly="readonly" placeholder="click for date"/>
					</td-->
					<!--td width="144">
					<input type="text"  name="orsStockSupplier_1" id="orsStockSupplier_1" class="cloned" maxlength="45"/>
					</td-->
					<td width="144">
					<input type="text"  name="orsStockExpiryDate_1" id="orsStockExpiryDate_1" class="futureDate cloned" readonly="readonly" placeholder="click for date"/>
					</td>
					<!--td width="144">
					<input type="text"  name="orsStockComments_1" id="orsStockComments_1" class="cloned" maxlength="255"/>
					</td-->
				</tr>
				<tr id="formbuttons_2">
					<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger_2" value="Add a Batch" width="12"/>
					<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove_2" value="Remove Batch" width="12"/>
				</tr>
			</table>
		</div>
		<!--close tabs-3-->

		<div id="tabs-4" class="tab Pharmacy">
			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Tablets)</td-->
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
					<!--td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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
		</div>
		<!--close tabs-4-->

		<div id="tabs-5" class="tab Stores">
			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Tablets)</td-->
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
					<!--td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Metronidazole (Flagyl) Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

		</div>
		<!--close tabs-5-->

		<div id="tabs-6" class="tab Others">
			<h3 align="center">Zinc Sulphate 20mg Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Tablets)</td-->
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
					<!--td width="144">
					<input type="number"  name="znStockQuantity_1" id="znStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Ciprofloxacin Assessment</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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

			<h3 align="center"> Metronidazole (Flagyl)</h3>
			<table>
				<thead>
					<tr>

						<td width="144">Batch No</td>
						<!--td width="144">Quantities at Hand (Sachets)</td-->
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
					<!--td width="144">
					<input type="number"  name="orsStockQuantity_1" id="orsStockQuantity_1" class="cloned fromZero" maxlength="6"/>
					</td-->
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
		</div>
		<!--end of tabs-6-->
	</div><!--end of div tabs-->

	<h3 align="center"> Oral Rehydration Therapy Corner Assessment </h3>
	<div class="block">
		<div class="column">
			<div class="row-title">
				<div class="left">
					ASPECTS
				</div>
				<div class="right" style="float:right">
					<div class="col">
						YES
					</div>
					<div class="col">
						NO
					</div>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label> Are dehydrated children rehydrated at this facility? </label>
				</div>
				<div class="right">
					<div class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_y" value="1" />
					</div>
					<div class="col">
						<input type="radio" name="ortQuestion1" id="ortQuestion1_n" value="0" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="left">
					<label> Does the facility have a designated location for oral rehydration ?</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_y"  value="1" />
					</div>
					<div class="col">
						<input type="radio" name="ortQuestion2" id="ortQuestion2_n" value="0" />
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<label class="dcah-label"> Check the various locations where rehydration is carried out</label>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> MCH</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> OPD</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> WARD </label>
				</div>
				<div class="right">
					<div class="col">
						<input type="checkbox" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="row hide" style="display:none">
				<div class="left" >
					<label> Other*?</label>
				</div>
				<div class="right">
					<div class="col">
						<input type="text" name="ortDehydrationLocation" id="ortDehydrationLocation"  value="" maxlength="50"/>
					</div>
				</div>
			</div>
		</div>
	</div>



</form>