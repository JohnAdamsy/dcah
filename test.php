<form id="externalFortified_B2" action="' . base_url() . 'submit/c_form_salt/form_externalFort_B2' . '" method="post">
	<h3> FORTIFIED SALT-AUDITS AND INSPECTION -TABLE B-2</h3>
	<p align="center">
		TECHNICAL AUDIT AND INSPECTION PRELIMINARY REPORT
	</p>
	<section class="block">
		<section class="column">
			<section class="row">
				<section class="left">
					<label for="inspection_registry">Inspection Registry:</label>
				</section>
				<section class="right">
					<input id="inspection_registry" name="inspectionRegistry" type="text" placeholder=""  required>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label for="inspection_date">Date of Inspection:</label>
				</section>
				<section class="right">
					<input id="inspectionDate" name="inspectionDate" type="text" readonly="true" placeholder="click for date">

				</section>
			</section>
			<section class="row">
				<section class="left">
					<label for="inspection_officer">Public Health Officers Name:</label>
				</section>
				<section class="right">
					<input id="inspection_officer" name="inspectionOfficerName" type="text" placeholder="Surname, Other Names"  required>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label for="address">Address:</label>
				</section>
				<section class="right">
					<input id="address" name="address" type="text" placeholder=""  required>
				</section>
			</section>
			<!--section class="row">
			<section class="left">
			<label for="mill_name">Mill name:</label>
			</section>
			<section class="right">
			<input id="mill_name" name="millName" type="text" placeholder=""  required>
			</section>
			</section-->
		</section>
		<section class="column" style="margin-bottom:10px">

			<section class="row">
				<section class="left">
					<label for="telephone">Telephone:</label>
				</section>
				<section class="right">
					<input id="telephone" name="telephone" type="text" placeholder=""  required>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label for="fax">Fax:</label>
				</section>
				<section class="right">
					<input id="fax" name="fax" type="text" placeholder=""  required>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label for="email">Email:</label>
				</section>
				<section class="right">
					<input id="email" name="email" type="email" placeholder="valid email" >
				</section>
			</section>
		</section>
	</section>
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
					<section class="col">
						N/A
					</section>
				</section>
			</section>
			<section class="row-title">
				1.1 Cleaning and sanitation:
			</section>
			<section class="row">
				<section class="left">
					<label> 1.1.1 Production area </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="productionArea" id="pda_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="productionArea" id="pda_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="productionArea" id="pda_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.1.2 Packaging area</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="packagingArea" id="pga_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="packagingArea" id="pga_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="packagingArea" id="pga_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.1.3 Warehouse</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="warehouse" id="wh_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="warehouse" id="wh_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="warehouse" id="wh_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.1.4 Staff facilities and toilettes</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="staffFacilities" checked="checked" id="staff_f_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="staffFacilities" id="staff_f_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="staffFacilities" id="staff_f_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row-title">
				1.2 Personnel:
			</section>
			<section class="row">
				<section class="left">
					<label> 1.2.1 Hygiene as required in regulations</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="hygiene" id="hygiene_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="hygiene" id="hygiene_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="hygiene" id="hygiene_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.2.2 Wearing protective clothing</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="protectiveClothing" id="protective_clothing_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="protectiveClothing" id="protective_clothing_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="protectiveClothing" id="protective_clothing" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.2.3 Trained in the tasks they perform</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="trainedInTask" id="trained_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="trainedInTask" id="trained_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="trainedInTask" id="trained_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row-title">
				<label> 1.3 Written procedures or instructions for:</label>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.3.1 Receipt and storage of premix</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="receiptAndStorage" checked="checked" id="rsp_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="receiptAndStorage" id="rsp_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="receiptAndStorage" id="rsp_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.3.2 Premix dilution (if applicable)</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="premixDilution" id="prem_dilution_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="premixDilution" id="prem_dilution_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="premixDilution" id="prem_dilution_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.3.3 Feeder verification</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="feederVerification" id="feeder_verification_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="feederVerification" id="feeder_verification_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="feederVerification" id="feeder_verification_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.3.4 Sampling of salt for QC</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="samplingSalt" checked="checked" id="sampling_salt_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="samplingSalt" id="sampling_salt_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="samplingSalt" id="sampling_salt_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 1.3.5 Iodine test for salt</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="saltIodineTest" checked="checked" id="salt_iodine_test_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="saltIodineTest" id="salt_iodine_test_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="saltIodineTest" id="salt_iodine_test_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row-title">
				2.0 Micronutrient premix:
			</section>
			<section class="row">
				<section class="left">
					<label> 2.1 Iodined compound inventory is upto to date</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="iodineInventoryUptodate" checked="checked" id="iodine_inventory_uptodate_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="iodineInventoryUptodate" id="iodine_inventory_uptodate_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="iodineInventoryUptodate" id="iodine_inventory_uptodate_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 2.2 Certificate of Analysis is received per lot</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="certificateOfAnalysis" id="certificate_of_analysis_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="certificateOfAnalysis" id="certificate_of_analysis_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="certificateOfAanalysis" id="certificate_of_analysis_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 2.3 Iodined compound is stored adequately</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="iodineStoredWell" id="iodine_stored_well_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="iodineStoredWell" id="iodine_stored_well_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="iodineStoredWell" id="iodine_stored_well_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 2.4 "First-in, first-out" system</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="fifoSystem" id="fifo_system_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="fifoSystem" id="fifo_system_na" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="fifoSystem" id="fifo_system_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 2.5 Iodined compound is handled well</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="iodineHandling" id="iodine_handling_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="iodineHandling" id="iodine_handling_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="iodineHandling" id="iodine_handling_na" value="n/a" />
					</section>
				</section>
			</section>
		</section>
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
					<section class="col">
						N/A
					</section>
				</section>
			</section>
			<section class="row-title">
				3.0 Salt Fortification:
			</section>
			<section class="row">
				<section class="left">
					<label> 3.1 Premix Preparation</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="premixPreparation" id="premix_preparation_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="premixPreparation" id="premix_preparation_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="premixPreparation" id="premix_preparation_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.1.1 Storage and handling adequate</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="storageHandlingArea" id="storage_handling_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="storageHandlingArea" id="storage_handling_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="storageHandlingArea" id="storage_handling_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.2 Records of feeder/sprayer performance are available</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="feederRecordsAvailable" id="feeder_records_available_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="feederRecordsAvailable" id="feeder_records_available_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="feederRecordsAvailable" id="feeder_records_available_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.3 Premix level in feeder adequate during visit</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="premixLevelAdequate" id="premix_level_adequate_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="premixLevelAdequate" id="premix_level_adequate_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="premixLevelAdequate" id="premix_level_adequate_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.4 Records of salt produced/premix used up to date</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="saltRecordsUptodate" id="salt_records_uptodate_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="saltRecordsUptodate" id="salt_records_uptodate_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="saltRecordsUptodate" id="salt_records_uptodate_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.5 Salt samples taken for analysis in  every shift</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="shiftSamplesTaken" id="shift_samples_taken_y" checked="checked" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="shiftSamplesT_samples_taken" id="shift_samples_taken_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="shiftSamplesTaken" id="shift_samples_taken_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row-title">
				3.6 Corrective action taken when:
			</section>
			<section class="row">
				<section class="left">
					<label> 3.6.1 Ratio salt produce/premix is not right</label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="ratioAction" id="ratio_action_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="ratioAction" id="ratio_action_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="ratioAction" id="ratio_action_na" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row">
				<section class="left">
					<label> 3.6.2 Results show iodine  40mg/kg </label>
				</section>
				<section class="right">
					<section class="col">
						<input type="radio" name="iodineResultsLevel" id="iodine_results_level_y" value="yes" />
					</section>
					<section class="col">
						<input type="radio" name="iodineResultsLevel" id="iodine_results_level_n" value="no" />
					</section>
					<section class="col">
						<input type="radio" name="iodineResultsLevel" id="iodine_results_level_na" checked="checked" value="n/a" />
					</section>
				</section>
			</section>
			<section class="row-title">
				4.0 Fortified salt:
			</section>
			<section class="row">
				<section class="left">
					<label> 4.1 Records of salt samples analyzed using:</label>
					<!--/section>
					<section class="right">
					<section class="col">
					<input type="radio" name="saltSamplesAnalyzed" id="salt_samples_analyzed_y" value="yes" />
					</section>
					<section class="col">
					<input type="radio" name="saltSamplesAnalyzed" id="salt_samples_analyzed_n" value="no" />
					</section>
					<section class="col">
					<input type="radio" name="saltSamplesAnalyzed" id="salt_samples_analyzed_na" value="n/a" />
					</section>
					</section-->
				</section>
				<section class="row">
					<section class="left">
						<label> 4.1.1 Internal Test</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="internalTest" id="internal_test_y" value="yes" />
						</section>
						<section class="col">
							<input type="radio" name="internalTest" id="internal_test_n" value="no" />
						</section>
						<section class="col">
							<input type="radio" name="internalTest" id="internal_test_na" value="n/a" />
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						<label> 4.1.2 External labaratory</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="externalLab" id="external_lab_y" value="yes" />
						</section>
						<section class="col">
							<input type="radio" name="externalLab_n" id="external_lab_n" value="no" />
						</section>
						<section class="col">
							<input type="radio" name="externalLab" id="external_lab_na" checked="checked" value="n/a" />
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						<label> 4.2 Daily composite samples are prepared</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="dailyCompPrepared" id="daily_compo_prepared_y" checked="checked" value="yes" />
						</section>
						<section class="col">
							<input type="radio" name="dailyCompPrepared" id="daily_compo_prepared_n" value="no" />
						</section>
						<section class="col">
							<input type="radio" name="dailyCompPrepared" id="daily_compo_prepared_na" value="n/a" />
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						<label>4.3 Last 30 samples are stored and available</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="lastSamplesStored" id="last_samples_stored_y" checked="checked" value="yes" />
						</section>
						<section class="col">
							<input type="radio" name="lastSamplesStored" id="last_samples_stored_n" value="no" />
						</section>
						<section class="col">
							<input type="radio" name="lastSamplesStored" id="last_samples_stored_na" value="n/a" />
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						<label>4.4 Labeling meets specifications</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="goodLabeling" id="good_labeling_y" checked="checked" value="yes" />
						</section>
						<section class="col">
							<input type="radio" name="goodLabeling" id="good_labeling_n" value="no" />
						</section>
						<section class="col">
							<input type="radio" name="goodLabeling" id="good_labeling_na" value="n/a" />
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						<label> 4.5 Fortified salt is stored adequately</label>
					</section>
					<section class="right">
						<section class="col">
							<input type="radio" name="fortifiedSaltStored" id="fortified_salt_stored_y" checked="checked" value="yes" />
						</section>

						<section class="col">
							<input type="radio" name="fortifiedSaltStored" id="fortified_salt_stored_n" value="no" />
						</section>

						<section class="col">
							<input type="radio" name="fortifiedSaltStored" id="fortified_salt_stored_na" value="n/a" />
						</section>
					</section>
				</section>
			</section>
		</section>
	</section>
	<section class="block">
		<section class="column-wide">
			<section class="row-title">
				Actions taken from recommendations of last technical auditing and inspection visit (Table B-2)
			</section>
			<section class="row">
				<section class="col-x4">
					Recommendations
					<textarea id="auditRecommendations" name="auditRecommendations"></textarea>
				</section>
				<section class="col-x4">
					Corrective actions taken
					<textarea id="correctiveActionTaken" name="correctiveActionTaken"></textarea>
				</section>
				<section class="right-wide">
					Assessment of corrective action(2)
					<section class="left-wide">
						<select name="assessmentCorrectiveAction" id="assessmentCorrectiveAction" >
							<option>Adequate</option>
							<option>Inadequate</option>
						</select>
					</section>
					<section class="right-wide">
						Comments
						<textarea id="auditComments" name="auditComments"></textarea>
					</section>
				</section>
			</section>
			<section class="row-title">
				New Recommmendations
			</section>
			<section class="row">
				<section class="left-wide">
					Non-compliances
					<textarea id="nonCompliancesIdentified" name="nonCompliancesIdentified"></textarea>
				</section>
				<section class="right-wide">
					Suggestions for improvement
					<textarea id="suggestionsForImprovement" name="suggestionsForImprovement"></textarea>	
				</section>
			</section>
			<section class="row right-wide">																																																										
			           Type of Iodine in Premix(Iodine/iodate):
                     <select name="iodineType" id="iodine_type">
                        <option value="" selected="selected">Select One</option>
						<option value="Iodine">Iodine</option>
						<option value="Iodate">Iodate</option>
					</select>
		</section>
	</section>
	<table>
		<tr>
			<td width="144">ID Composite</td>
			<td width="144">[Iodine](mg/kg)</td>
			<td width="144">Ref. [Iodine]</td>
			<td width="144">[Iodine](mg/kg)</td>
			<td width="144">ID Other</td>
			<td width="144">[Iodine](mg/kg)</td>
			<td width="144">[Iodine](mg/kg)</td>
		</tr>
		<tr class="clonable">
			<td width="144">
			<input type="text"  name="IDComposite" id="iodineDate1" class="cloned"/>
			</td>
			<td width="144">
			<input type="number"  name="IDCompositemgKg" class="cloned fromZero"/>
			</td>
			<td width="144">
			<input type="text"  name="refIodine" id="iodineDrums" class="cloned"/>
			</td>
			<td width="144">
			<input type="number"  name="refIodineMgKg" id="iodineLot" class="cloned fromZero"/>
			</td>
			<td width="144">
			<input type="text"  name="IDOther" id="iodineExpiration" class="cloned"/>
			</td>
			<td width="144">
			<input type="number" name="IDOtherMgKg" id="iodineDispatched" class="cloned fromZero"/>
			</td>
			<td width="144">
			<input type="text" name="IDOtherMgKg2" id="iodineStock" class="cloned"/>
			</td>
		</tr>
		<tr id="formbuttons">
			<input title="Adds a new row after the last" type="button" class="awesome myblue medium" id="clonetrigger" value="Add a row"/>
			<input title="Removes the last row" type="button" class="awesome myblue medium" id="cloneremove" value="Remove Row"/>
		</tr>
	</table>

	<section class="row">
		<!--section class="left-wide">
		Public Health Officer (Name)
		<input id="inspection_officer" name="inspectionOfficerName" type="text" placeholder="Surname, Other Names"  required>
		</section-->
		<!--section class="right-wide">
		Date
		<input id="inspection_date" name="inspectionDate" type="text" readonly="true" placeholder="click for date">
		</section-->
	</section>
	<section class="column-wide">
		<section class="row">
			<section class="left-wide">
				Supervisor (Name)
				<input id="supervisor_name" name="supervisorName" type="text" placeholder="Surname, Other Names"  required>
			</section>
			<section class="right">
				Date
				<input id="supervision_date" name="supervisionDate" type="text" readonly="true" placeholder="click for date">
			</section>
		</section>
	</section>

</form>