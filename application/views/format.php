<form name="form_assessment_equiqment" id="form_assessment_equiqment" method="POST" action="' . base_url() . 'submit/c_form/form_assessment_equiqment' . '" >
	<!-- form for collecting inventory status information -->
	<h3 align="center"> ASSESSMENT OF EQUIPMENT AND SUPPLIES FOR EmONC</h3>

	<section class="block">
		<section class="column-wide">
			<section class="row-title">
				ASSESSMENT OF EmONC EQUIPMENT AND SUPPLIES
			</section>
			<section class="row">
				<section class="left">
					1. Faciliy Name
				</section>
				<section class="right">
					<input type="text" />
				</section>

			</section>

			<section class="row">
				<section class="left">
					2. Faciliy Number
				</section>
				<section class="right">
					<input type="number" />
				</section>

			</section>

			<!--
			<section class="row">
			<section class="left">
			</section>
			<section class="center">
			</section>
			-->

			<section class="row">
				<section class="left">
					3. Keph Level
				</section>
				<section class="right">
					<select>
						<option>Keph 1</option>
						<option>Keph 2</option>
						<option>Keph 3</option>
						<option>Keph 4</option>
						<option>Keph 5</option>
						<option>Keph 6</option>
					</select>
				</section>
			</section>

			<section class="row">
				<section class="left">
					4. Date<em>(Today)</em>
				</section>
				<section class="right">
					<input type="date" class="autoDate" />
				</section>
			</section>
		</section>
	</section>

	<table>

		<section class="block">
			<section class="column-wide">
				<section class="row-title">
					<section class="left">
						Inventory Type: Labor & Delivery
					</section>
					<section class="center" >
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
						5. Does this facility provide delivery services
					</section>
					<section class="center">
						<section class="col">
							<input type="radio"/>
						</section>
						<section class="col">
							<input type="radio"/>
						</section>
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>
				<section class="row">
					<section class="left">
						6. Does the facility provide 24 hour coverage for delivery services?
					</section>
					<section class="center">
						<section class="col">
							<input type="radio"/>
						</section>
						<section class="col">
							<input type="radio"/>
						</section>
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>
				<section class="row">
					<section class="left">
						7. Is a person skilled in conducting deliveries present  at the facility or on call 24 hours a day,
						including weekends, to provide delivery care?
					</section>
					<section class="right">
						<select>
							<option>Yes, present, schedule observed</option>
							<option>Yes, present, schedule reported, not seen</option>
							<option>Yes, on-call schedule observed</option>
							<option>Yes, on-call, schedule reported, not seen</option>
							<option>No</option>
						</select>
					</section>

				</section>
				<section class="row">
					<section class="left">
						8. Please tell me the total number of beds in the maternity ward / unit in this facility
					</section>
					<section class="right">
						<input type="number" />
					</section>

				</section>

				<section class="row-title">
					ASK TO SEE THE ROOM WHERE NORMAL DELIVERIES ARE CONDUCTED
				</section>

				<section class="row">
					<section class="left">
						9. Describe the setting of the Delivery Room
					</section>
					<section class="right">
						<select>
							<option>private room, visual & auditory privacy</option>
							<option>non-private room, visual & auditory privacy</option>
							<option>visual privacy only</option>
							<option>no privacy</option>
						</select>
					</section>

				</section>

				<h3>NOTE THE AVAILABILITY AND CONDITION OF SUPPLIES AND EQUIPMENT REQUIRED FOR DELIVERY SERVICES. EQUIPMENT MAY BE IN DELIVERY ROOM OR AN ADJACENT ROOM.</h3>

			</section>
			<section class="column-wide">
				<section class="row">

					<section class="row-title">
						<section class="left">
							10. EQUIPMENT REQUIRED FOR DELIVERY SERVICES
						</section>
						<section class="center">
							<section class="row-title">
								Availability (A)
							</section>

						</section>
						<section class="right">

							<section class="row-title">
								Functioning (B)
							</section>
						</section>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10a. Examination light
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10b. Delivery bed/ couch
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10c. Clean or sterile gloves
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10d.Mackintosh
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10e. Linen
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10f. Disposable Needles (gauge 21, 23)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10g. Sharps container
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10h. At least five or more 2-ml or 5-ml disposable syringes
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10i. Three properly labeled or colour coded IP buckets
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10j. Jik
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10k. Soap for washing instruments
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10l.Soap for handwashing
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10m.Properly Labelled or colour coded waste segragation bins
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10n. Drip stand
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10o. Single-use hand-drying towels
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						10p. Running  Water for handwashing
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>
			</section>

			<section class="column-wide">
				<section class="row">

					<section class="row-title">
						<section class="left">
							11. Inspect the contents of available delivery
							kits and note if it corresponds to the standard kit requirements
						</section>
						<section class="center">
							Quantity
						</section>
						<section class="right">
							Comments
						</section>
					</section>

				</section>

				<section class="row">
					<section class="left">
						11a. Cord scissors-1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11b. Cord clamps/ ties
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11c. Long artery Forceps (straight, lockable)-2
					</section>

					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11d. Episiotomy scissors  -1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11e. Kidney dishes  -2
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11f. Gallipots -1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11g. Sponge-holding forceps -1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11h. Needle holder-1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11i. Dissecting forceps -toothed-1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11j. Instrument tray with cover -1
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						11k. Total number of delivery kits in the labour ward
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						11l. Total number of delivery kits with all required items above (17C)
					</section>
					<section class="center">
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>
				<section class="row-title">
					<section class="left">
						12. Other Equipment and supplies
					</section>
					<section class="center">
						<section class="row-title">
							Availability (A)
						</section>

					</section>
					<section class="right">

						<section class="row-title">
							Functioning (B)

						</section>
					</section>
				</section>

				<section class="row">
					<section class="left">
						12a. Stethoscopes  adult and neonatal
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12b. BP machine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>
				<section class="row">
					<section class="left">
						12c. Thermometer
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>
				<section class="row">
					<section class="left">
						12d. Fetoscope or sonicaid
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>
				<section class="row">
					<section class="left">
						12e. Suction Machine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12f. Weighing Scale for babies
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12g. Weighing scale for premature/ LBW babies; (digital/ graduated)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12h. Adult resuscitation tray
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12i. Autoclave or steriliser
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12j. Manual Vacuum Aspiration kit
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12k. Ventouse or Kiwi vacuum extractor
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12l. Dilatation and curretage kit
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12m. Raytech gauze
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12n. Sanitary pads
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12o. Elbow length gloves
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12p. Patellar Hammer
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

				<section class="row">
					<section class="left">
						12q. Sutures
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<select>
							<option> Yes </option>
							<option> No </option>
							<option> Do Not Know </option>
						</select>
					</section>

				</section>

			</section>

			<section class="column-wide">

				<section class="row-title">
					<section class="left">
						13. MEDICATIONS IN the Maternity /Labour ward
					</section>
					<section class="center">

					</section>
				</section>

				<section class="row">
					<section class="left">
						13a. Intravenous solutions: either Ringers lactate, D5NS, or NS infusion
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13b. Injectable ergometrine/ methergine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13c. Injectable oxytocin/ syntocin
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13d. Injectable Hydralazine or Apresoline
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13e. Injectable diazepam
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13f. Injectable magnesium sulfate
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13g. Injectable amoxicillin or ampicillin
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13h. Injectable gentamicin
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13i. Calcium gluconate
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13j. Methyldopa/Aldomet
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13k. Lidocaine (lignocaine) or other local anesthetic
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13l. Nifedipine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13m. Vitamin A
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13n. Vitamin K
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13o. Oxygen
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						13p. Other / specify
					</section>
					<section class="center">
						<textarea></textarea>
					</section>
					<section class="right">
						<input type="text" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						14a. Does this facility perform newborn resuscitation?
					</section>
					<section class="right">
						<section class="col">
							<input type="radio"/>
						</section>
						<section class="col">
							<input type="radio"/>
						</section>
					</section>
				</section>
				<section class="row">
					<section class="left">
						14b. Has this facility performed newborn resuscitation in the last 3 months with bag and mask?
					</section>
					<section class="right">

					</section>
				</section>
				<section class="row-title">
					<section class="left">
						15. EQUIPMENT AND SUPPLIES FOR NEWBORN CARE
					</section>
					<section class="center">
						OBSERVED (a)
					</section>
					<section class="center">
						GO TO
					</section>
					<section class="center">

					</section>
				</section>

				<section class="row">
					<section class="left">
						15a. Self inflating Neonatal Ambu bag ( 500 mls)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						15b. Infant masks  (size 0-preterm)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						15c. Infant mask size 1 (term new born)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15d. Infant mask size 2 (infant up to 1 yr)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15de. Clock  with seconds arm
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15f. Neonatal Incubator
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15g. A Radiant Heater
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15h. Infant Scale
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15i. Suction bulb for mucus extraction
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15j. Suction apparatus for use with catheter
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15k. A flat, clean, dry and warm newborn resuscitation surface
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15L. Disposable cord ties or clamps
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						15m. Clean and warm towels/cloths for drying / warming / wrapping baby
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row-title">
					<section class="left">
						QUESTION
					</section>
					<section class="center">
						OBSERVED (a)
					</section>
					<section class="center">
						GO TO
					</section>
					<section class="center">
						<section class="col-x4">
							Observed
						</section>
						<section class="col-x4">
							Yes
						</section>
						<section class="col-x4">
							No
						</section>
					</section>
				</section>

				<section class="row">
					<section class="left">
						16. Does this facility perform blood transfusions? (IF YES, Is there a blood bank or are there transfusion  services only)
					</section>
					<section class="center">
						<section class="col-x4">
							<input type="radio"/>
						</section>
						<section class="col-x4">
							<input type="radio"/>
						</section>
					</section>
				</section>

				<section class="row">
					<section class="left">
						17. Does this facility ever perform caesarean sections?
					</section>
					<section class="center">
						<section class="col-x4">
							<input type="radio"/>
						</section>
						<section class="col-x4">
							<input type="radio"/>
						</section>
					</section>
				</section>

				<section class="row-title">
					<section class="left">
						18. EQUIPMENT
					</section>
					<section class="center">

					</section>
				</section>

				<section class="row">
					<section class="left">
						18a. Operating Table
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>

				</section>

				<section class="row">
					<section class="left">
						18b. Operating Light
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18c. Anaesthetic machine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18d. Laryngoscopes
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18e. Endotracheal tubes
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18f. Anaesthetic drugs e.g ketamine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18g. Anaesthetic gases (halothane, NO2, Oxygen, etc)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18h. Drugs and supplies for spinal anesthesia (e.g. Spinal needle)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18i. Scrub area adjacent to or in the operating room
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18j. Running Water
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18k. Suction Machine
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18l. Standard Cesaerian section kit
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18m. Sterile operation gowns
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18n. Sterile Drapes
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18o. Sterile gloves in various sizes (6.5 -9)
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18p. IV canulas
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18q. Drip Stand
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18r. Blood transfusion set
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

				<section class="row">
					<section class="left">
						18s. Recovery room/ recovery area
					</section>
					<section class="center">
						<select>
							<option> Observed </option>
							<option> Reported, Not Seen </option>
							<option> Not Available </option>
							<option> Dont Know </option>
						</select>
						<input type="number" />
					</section>
				</section>

			</section>

		</section>

</form>
