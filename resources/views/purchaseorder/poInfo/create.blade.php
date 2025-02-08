@section('title',"PO Create")
@extends('layout.app')
@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 40px;
            line-height: 40px;
        }
        .select2-container .select2-selection--single .cur_code {
            height: 40px;
            line-height: 40px;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding: 8px;
        }
        .select2-container {
            width: 100% !important;
        }
        .select2-container .select2-selection--single {
            border: 1.5px solid #68b664 !important;
            border-radius: 4px !important;
        }
        .select2-container .select2-dropdown {
            border: 1px solid #68b664 !important;
            border-radius: 4px !important;
        }
         .resizable-input {
             min-width: 100px;
             max-width: 500px;
             padding: 5px;
         }
        .form-control-text-area {
            resize: none;  /* Prevent manual resizing */
            overflow: hidden;  /* Hide scrollbars */
        }
    </style>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="itemDataAdd">
                        <h4 class="card-title">PO Create</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample">@csrf
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="purchase_order_no">PO No</label>
                                    <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no" placeholder="Enter PO Number" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="purchase_order_date">PO Date</label>
                                    <input type="text" class="form-control" name="purchase_order_date" id="purchase_order_date" placeholder="ACME Inc." />
                                </div>
                                <div class="col m-1">
                                    <label for="origin">PO Origin</label>
                                    <select class="form-control select2" name="origin" id="origin">
                                        <option value="">Select Purchase Order Origin</option>
                                        <option value="F">Foreign</option>
                                        <option value="L">Local</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="lc_number">LC Number</label>
                                    <input type="text" class="form-control" name="lc_number" id="lc_number" placeholder="John Doe" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="lc_bank_id">LC Bank Name</label>
                                    <select class="form-control select2" name="lc_bank_id" id="lc_bank_id">
                                        <option value="">Select LC Bank Name</option>
                                        <option value="03">Sonali Bank Ltd.</option>
                                        <option value="02">Janata Bank Ltd.</option>
                                        <option value="01">Rupali Bank Ltd.</option>
                                        <option value="04">Standard Bank Ltd.</option>
                                        <option value="05">HSBC Bank Bangladesh</option>
                                        <option value="06">BDBL Bank Ltd.</option>
                                        <option value="07">Basic Bank Ltd.</option>
                                        <option value="08">Bangladesh Krishi Bank</option>
                                        <option value="09">United Commercial Bank Limited</option>
                                        <option value="10">NRB Commercial Bank Ltd</option>
                                        <option value="11">Jamuna Bank Limited</option>
                                        <option value="12">Premier Bank Ltd</option>
                                        <option value="13">MERCANTILE BANK LTD.</option>
                                        <option value="14">Shahjalal Islami Bank Limited</option>
                                    </select>
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="lc_date">LC Date</label>
                                    <input type="text" class="form-control" name="lc_date" id="lc_date" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label for="cost_type">Cost Type</label>
                                    <select class="form-control select2" name="cost_type" id="cost_type">
                                        <option value="">Select Cost Type</option>
                                        <option value="P">Purchase Cost</option>
                                        <option value="T">Transportation Cost</option>
                                        <option value="O">Other Cost</option>
                                    </select>
                                </div>
                                <div class="col m-1">
                                    <label for="store">Store</label>
                                    <select class="form-control select2" name="store" id="store">
                                        <option value="">Select Store</option>
                                        <option value="L168">IVVR Project, Phase II, BPDB, Dhaka</option>
                                    </select>
                                </div>
                                <div class="col m-1">
                                    <label for="consignee_id">Consignee</label>
                                    <select class="form-control select2" name="consignee_id" id="consignee_id">
                                        <option value="">Select Consignee</option>
                                        <option value="530">Shikolbaha 225 MW Combined Cycle Power Plant</option>
                                        <option value="452">Bibiyana-3, 400MW CCPP, BPDB, Nabiganj, Habiganj</option>
                                        <option value="541">Ghorashal Power Station 3rd Unit</option>
                                        <option value="542">Barapukuria 275 MW Coal Fired Thermal  Power Plant (3rd Unit)</option>
                                        <option value="543">Manager, Shahjibazar 60 MW PS</option>
                                        <option value="603">Director, IPP Cell-1</option>
                                        <option value="604">IPP-2</option>
                                        <option value="605">IPP-3</option>
                                        <option value="701">G. M. Com. Operation</option>
                                        <option value="702">SE, Enegy Auditing Unit, Dhaka</option>
                                        <option value="706">XEN, Energy Auditing Unit Division-3, CTG</option>
                                        <option value="707">XEN, Energy Auditing Unit Division, Cumilla</option>
                                        <option value="709">XEN, Energy Auditing Unit Division, Rangpur</option>
                                        <option value="710">XEN, Energy Auditing Unit Division, Bogra</option>
                                        <option value="712">XEN, Energy Auditing Unit Division, Sylhet</option>
                                        <option value="713">XEN, Energy Auditing Unit Division, Khulna</option>
                                        <option value="714">XEN, Energy Auditing Unit Division, Jessore</option>
                                        <option value="715">XEN, Energy Auditing Unit Division, Barishal</option>
                                        <option value="716">Computer Center, Dhaka</option>
                                        <option value="717">Computer Center, Chattogram</option>
                                        <option value="718">Computer Center, Cumilla</option>
                                        <option value="721">Pre-Payment Metering Project for Distribution, South Zone, Chattgong</option>
                                        <option value="722">Pre-Payment Metering Project For Distribution Jan Komilla and Maymensingh</option>
                                        <option value="727">Project Director (Chief Engineer), Power System Development Project, BPDB, Rangpur</option>
                                        <option value="730">SE, O &amp; M Circle, CTG Metro (EAST)</option>
                                        <option value="731">XEN, S &amp; D Kalurghat</option>
                                        <option value="732">XEN, S &amp; D Patharghata</option>
                                        <option value="733">XEN, S &amp; D Stadium</option>
                                        <option value="734">XEN, S &amp; D Sholoshahor</option>
                                        <option value="735">XEN, S &amp; D Bakolia</option>
                                        <option value="736">XEN, S &amp; D Madarbari</option>
                                        <option value="737">SE, O &amp; M Circle, CTG Metro (WEST)</option>
                                        <option value="738">XEN, S &amp; D Agrabad</option>
                                        <option value="739">XEN, S &amp; D Khulshi</option>
                                        <option value="740">XEN, S &amp; D Pahartali</option>
                                        <option value="741">XEN, S &amp; D Halishahor</option>
                                        <option value="742">XEN, S &amp; D Newmooring</option>
                                        <option value="743">XEN, S &amp; D Rampur</option>
                                        <option value="744">SE, O &amp; M Circle, CTG  (North)</option>
                                        <option value="745">XEN, S &amp; D Fauzdarhat</option>
                                        <option value="746">XEN, S &amp; D, Sandwip</option>
                                        <option value="748">XEN, S &amp; D Hathazari</option>
                                        <option value="749">XEN, S &amp; D Mohara</option>
                                        <option value="750">SE, O &amp; M Circle, CTG  (South)</option>
                                        <option value="751">XEN, Dist. Div. Patiya</option>
                                        <option value="752">Satkania E.S</option>
                                        <option value="753">Dohazari E.S</option>
                                        <option value="754">XEN, Dist. Div. Cox's bazar</option>
                                        <option value="755">XEN, S &amp; D Chakaria</option>
                                        <option value="756">Ramu E.S</option>
                                        <option value="757">Lama E.S</option>
                                        <option value="758">Kutubdia ES</option>
                                        <option value="771">Additional Director Comm. Operation</option>
                                        <option value="759">SE, O &amp; M Circle, Rangamati</option>
                                        <option value="760">XEN, Dist. Div. Rangamati</option>
                                        <option value="761">Kaptai Electric Supply</option>
                                        <option value="762">Betbunia E.S</option>
                                        <option value="763">Marishya E.S</option>
                                        <option value="768">Dighinala E.S</option>
                                        <option value="767">Mahalchari E.S</option>
                                        <option value="769">Manikchari E.S</option>
                                        <option value="779">Muktagacha Electricity Supply</option>
                                        <option value="781">Gouripur Electricity Supply</option>
                                        <option value="787">XEN, S &amp; D Gaffargoan</option>
                                        <option value="790">XEN, S &amp; D Bajitpur</option>
                                        <option value="792">Kuliarchor Electricity Supply</option>
                                        <option value="793">Shimulkandi Electricity Supply</option>
                                        <option value="808">Zonal Repair Shop, Tongi, Gazipur</option>
                                        <option value="809">Chief Engineer, Distribution Zone, Cumilla</option>
                                        <option value="810">SE, O &amp; M Circle, Cumilla</option>
                                        <option value="811">XEN, S &amp; D-I, Cumilla</option>
                                        <option value="812">Burichang Electricity Supply</option>
                                        <option value="813">XEN, S &amp; D-II, Cumilla</option>
                                        <option value="814">Chouddagram Electricity Supply</option>
                                        <option value="815">XEN, S &amp; D-III, Cumilla</option>
                                        <option value="816">XEN, S &amp; D Daulatganj</option>
                                        <option value="817">XEN, S &amp; D Chandpur</option>
                                        <option value="818">XEN, S &amp; D - 1 B-Baria</option>
                                        <option value="819">XEN, S &amp; D Ashuganj</option>
                                        <option value="820">XEN, S &amp; D Sarail</option>
                                        <option value="821">SE, O &amp; M Circle, Noakhali</option>
                                        <option value="822">XEN, Dist. Div. Noakhali</option>
                                        <option value="823">XEN, Dist. Div. Feni</option>
                                        <option value="824">XEN, S &amp; D Laxmipur</option>
                                        <option value="825">XEN, S &amp; D Chaumuhoni </option>
                                        <option value="826">XEN, Sales &amp; Distribution Division, Bosurhat </option>
                                        <option value="827">XEN, S &amp; D Hatia</option>
                                        <option value="829">Chief Engineer Distribution Zone, Sylhet</option>
                                        <option value="830">XEN, S &amp; D-I, Sylhet </option>
                                        <option value="831">XEN, S &amp; D-II, Sylhet</option>
                                        <option value="832">XEN, S &amp; D-III, Sylhet </option>
                                        <option value="833">XEN, S &amp; D-IV, Sylhet </option>
                                        <option value="834">XEN, S &amp; D Sunamganj</option>
                                        <option value="835">Derai Electricity Supply</option>
                                        <option value="836">XEN, S &amp; D Chatak</option>
                                        <option value="837">SE, O &amp; M Circle, Moulavibazar</option>
                                        <option value="838">XEN, S &amp; D Moulavibazar </option>
                                        <option value="839">XEN, S &amp; D Habiganj </option>
                                        <option value="840">XEN, S &amp; D Kulaura </option>
                                        <option value="842">Jagannathpur Electricity Supply</option>
                                        <option value="844">XEN, SCADA, PDB, Chattogram</option>
                                        <option value="1000005">Chief Engineer (P &amp; D), BPDB, Dhaka</option>
                                        <option value="101">Central Secretariat, BPDB</option>
                                        <option value="102">Clearance &amp; Movements</option>
                                        <option value="103">Printing Press</option>
                                        <option value="201">General Manager, Training, PDB, Dhaka</option>
                                        <option value="202">Train.&amp; Career. Dev..</option>
                                        <option value="204">Training Academy Cox'sbazar</option>
                                        <option value="205">Director, Ghorashal Training Centre, BPDB, Polash, Narsingdi</option>
                                        <option value="206">Director, Chattogram Training Centre, BPDB, Chattogram</option>
                                        <option value="208">Deputy Director, Regional Training Centre, BPDB, Tongi, Gazipur</option>
                                        <option value="209">Chief Medical Officer (C.M.O), Dhaka</option>
                                        <option value="210">Directorate of Personnel</option>
                                        <option value="212">Trustee Board</option>
                                        <option value="216">Directorate of Security &amp; Investigation, Dhaka</option>
                                        <option value="301">Controller Office</option>
                                        <option value="302">Directorate of Accounts</option>
                                        <option value="303">Directorate of  Audit, Dhaka</option>
                                        <option value="304">Directorate of Purchase</option>
                                        <option value="305">Directorate of Finance, Dhaka</option>
                                        <option value="306">Regional Accounting Office, P &amp; CO, Dhaka</option>
                                        <option value="307">COOAC</option>
                                        <option value="308">Regional Accounting Office (P&amp;D)</option>
                                        <option value="309">Regional Accounting Cell, Raujan</option>
                                        <option value="312">Regional Accounting Office, Cumilla</option>
                                        <option value="313">Regional Accounting Office, Noakhali</option>
                                        <option value="314">Regional Accounting Office, Sylhet</option>
                                        <option value="315">Regional Accounting Office,Khulna Power Station</option>
                                        <option value="316">Regional Accounting Office, Ghorashal Power Station</option>
                                        <option value="317">RAO Siddhirgonj Thermal Power Station</option>
                                        <option value="319">Bhola RAO</option>
                                        <option value="320">Regional Accounting Office, Shahjibazar</option>
                                        <option value="321">Regional Accounting Office, Chattogram Electric Supply</option>
                                        <option value="322">Regional Accounting Office, 80 MW Power Station, Tongi</option>
                                        <option value="325">Regional Accounting Office, Barishal</option>
                                        <option value="327">Regional Accounting Office, Shikolbaha</option>
                                        <option value="328">Regional Accounting Office, Chadpur</option>
                                        <option value="329">Regional Accounting Office, Kaptai</option>
                                        <option value="330">Regional Accounting Office, Rangpur</option>
                                        <option value="401">Chief Engineer, Generation, Dhaka</option>
                                        <option value="402">Haripur Power Station</option>
                                        <option value="416">Chief Engineer, Bhola 225 MW Combined Cycle Power Plant</option>
                                        <option value="417">Gas Turbine Power Station, Barishal</option>
                                        <option value="418">Diesel Power Station Barishal</option>
                                        <option value="419">Diesel Power Station, Bhola</option>
                                        <option value="420">Titas 50 MW Peaking Power Plant, BPDB, Titas, Cumilla</option>
                                        <option value="421">Chadpur 150 MW Combined Cycle Power Station</option>
                                        <option value="426">Manager, Shikolbaha Power Plant, BPDB, Chattogram</option>
                                        <option value="427">150MW Peaking Power Plant, Shikalbaha</option>
                                        <option value="429">Khulna Power Station</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label for="supplier_id">Supplier</label>
                                    <select class="form-control select2" name="supplier_id" id="supplier_id">
                                        <option value="">Select Supplier</option>
                                        <option value="000011">joint Venture of Shenzhen inhemeter,co.Ltd</option>
                                        <option value="000012">M/S. Powermann Bangladesh Ltd</option>
                                        <option value="000013">M/S. REVERIE POWER &amp; AUTOMATION ENGINEERING LTD</option>
                                        <option value="000123">M/S Khan Brothers International, KBG</option>
                                        <option value="000174">Shikalbaha 60 MW Power Station,BPDB,Ctg.</option>
                                        <option value="000175">Meghna Petroleum Limited</option>
                                        <option value="000176">M/S Ideal Electrical Enterprise Ltd.</option>
                                        <option value="000177">Kamal &amp; Brothers, Vill &amp; Post. Shikalbaha, P.S. Karnaphuli, Chattagram.</option>
                                        <option value="000178">M/s Nur-A-Mashruf</option>
                                        <option value="000179">Shonali Electric, Agrabad, Chattogram.</option>
                                        <option value="000180">M/S. Rubel Automobiles, &amp; Workshop, 161, Sk. Mujib Road, Barik Building,Chattogram.</option>
                                        <option value="000181">M/S. Progressive Engineering &amp; Construction Co. Ltd. 17/2, Eskaton Garden Road, Dhaka-1000.</option>
                                        <option value="000182">M/s. Safety Power, 142/3, Arambagh (1st Floor), Motijheel, Dhaka-1000, Bangladesh</option>
                                        <option value="000183">Multistar Technologies,Lorna office complex, 94/A New Eskaton road, Dhaka.</option>
                                        <option value="000184">FLORA LIMITED, Chattogram.</option>
                                        <option value="000185">Chowdhury Motors, 314, Sk. Mujib Road, Chattogram.</option>
                                    </select>
                                </div>
                                <div class="col m-1">
                                    <label for="department_id">Department</label>
                                    <select class="form-control select2" name="department_id" id="department_id">
                                    </select>
                                </div>
                                <div class="col m-1">
                                    <label for="purchase_type">PO Type</label>
                                    <select class="form-control select2" name="purchase_type" id="purchase_type">
                                        <option value="">Select Purchase Type</option>
                                        <option value="OT">Open Tendering Method</option>
                                        <option value="LT">Limited Tendering Method</option>
                                        <option value="DP">Direct Procurement Method</option>
                                        <option value="RQ">Request for Quotation Method</option>
                                        <option value="OS">One Stage Two Envelope Tendering Method</option>
                                        <option value="TS">Two-Stage Tendering Method</option>
                                        <option value="OH">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="vat">VAT</label>
                                    <input type="number" class="form-control" value="0" name="vat" id="vat" placeholder="Enter VAT Amount" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="tax">Tax</label>
                                    <input type="number" class="form-control" value="0" name="tax" id="tax" placeholder="Enter Tax Amount" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="transportation">Transportation</label>
                                    <input type="number" class="form-control" value="0" name="transportation" id="transportation" placeholder="Enter Transportation Amount" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="freight">Freight</label>
                                    <input type="number" class="form-control" value="0" name="freight" id="freight" placeholder="Enter Freight Amount" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="installation">Installation</label>
                                    <input type="number" class="form-control" value="0" name="installation" id="installation" placeholder="Enter Installation Amount" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="other">Other</label>
                                    <input type="number" class="form-control" value="0" name="other" id="other" placeholder="Enter Other Amount" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="discount">Discount</label>
                                    <input type="number" class="form-control" value="0" name="discount" id="discount" placeholder="Enter Discount Amount" />
                                </div>
                                <div class="col m-1">
                                </div>
                                <div class="col m-1">
                                </div>
                                <div class="col m-1">
                                </div>
                            </div>

                            <div class="form-group table-responsive" id="itemSpack">
                                <h5 class="mt-3 card-description">
                                    PO Item Details
                                </h5>
                                <div class="table-responsive text-nowrap">
                                    <table id="usersTables" class="table table-bordered">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>#</th>
                                            <th>Item Description, Attribute,Attribute Value</th>
                                            <th>Select MS. Unit</th>
                                            <th>Select Currency</th>
                                            <th>Conv. Rate</th>
                                            <th>Unit Cost</th>
                                            <th>Total Qty</th>
                                            <th>Amount Total</th>
                                            <th>VAT Amount</th>
                                            <th>Tax Amount</th>
                                            <th>Transportation</th>
                                            <th>Freight Amount</th>
                                            <th>Installation</th>
                                            <th>Other Amount</th>
                                            <th>Discount Amount</th>
                                            <th>Item Total Cost</th>
                                            <th>Total Amount (BDT)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="rowsContainer">
                                        {{--<tr class="dynamic-row">
                                            <td><button class="btn btn-sm btn-outline-danger remove-row "><i class="bx bx-trash"></i></button></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="hidden" id="itemIDs" name="itemIDs[]"/>
                                                    <input type="hidden" id="attributes" name="attributes[]"/>
                                                    <input type="hidden" id="attributeValues" name="attributeValues[]"/>

                                                    <textarea oninput="autoResize(this)" type="text"readonly class="form-control form-control-text-area" name="itemdetailsTextArea[]" id="itemdetailsTextArea">Item : Item Name, Size : Item Size, Capacity : Item Capacity</textarea>
                                                    <input type="button" class="mt-1 btn btn-outline-info btn-sm addAttributes" value="Select Item Attribute & Values">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control select2 cur_code1 resizable-select" id="cur_code1" name="cur_code1[]">
                                                        <option value="">Select</option>
                                                        <option value="0001">Taka</option>
                                                        <option value="0002">USD</option>
                                                        <option value="0003">Pound</option>
                                                        <option value="0004">Frunk</option>
                                                        <option value="0005">EURO</option>
                                                        <option value="0006">Kuwaiti Dinar</option>
                                                        <option value="0007">HONG KONG DOLLAR</option>
                                                        <option value="0008">YEN</option>
                                                        <option value="0009">INR</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control select2 cur_code resizable-select" id="cur_code" name="cur_code[]">
                                                        <option value="">Select</option>
                                                        <option value="0001">Taka</option>
                                                        <option value="0002">USD</option>
                                                        <option value="0003">Pound</option>
                                                        <option value="0004">Frunk</option>
                                                        <option value="0005">EURO</option>
                                                        <option value="0006">Kuwaiti Dinar</option>
                                                        <option value="0007">HONG KONG DOLLAR</option>
                                                        <option value="0008">YEN</option>
                                                        <option value="0009">INR</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td><input type="number" class="form-control resizable-input" name="con_rate[]" value="0" min="0" id="con_rate"  oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="unit_cost[]" value="0" min="0"  id="unit_cost" oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="qunty[]" value="0" min="0"  id="qunty" oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="amountTotal[]" value="0" min="0"  id="amountTotal" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="vat[]" value="0" min="0"  id="vat" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="tax[]" value="0" min="0"  id="tax" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="transportation[]" value="0" min="0"  id="transportation" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="freight[]" value="0" min="0"  id="freight" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="installation[]" value="0" min="0"  id="installation" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="other[]" value="0" min="0"  id="other" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="discount[]" value="0" min="0"  id="discount" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="item_total_cost[]" value="0" min="0"  id="item_total_cost" readonly oninput="resizeInput(this)"></td>
                                            <td><input type="number" class="form-control resizable-input" name="item_total_cost_bdt[]" value="0" min="0"  id="item_total_cost_bdt" readonly oninput="resizeInput(this)"></td>
                                        </tr>--}}
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button class="btn btn-outline-success btn-sm add-row"><i class='bx bx-plus'></i></button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <button type="button" onclick="addData()" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =================================================Add Customers=========================================================== -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add Attribute and Values</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        @csrf
                        <div class="col m-1">
                            <label for="item_list_id">Item Details</label>
                            <select class="form-control select2" name="item_list_id" id="item_list_id"></select>
                        </div>
                        <table id="usersTables" class="table">
                            <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Attribute</th>
                                <th>Attribute Value</th>
                            </tr>
                            </thead>
                            <tbody id="rowsContainerItem">
                            <tr class="text-nowrap">
                                <th><button class="btn btn-sm btn-outline-danger remove-row-attribute"><i class="bx bx-trash"></i></button></th>
                                <th>
                                    <div class="col m-1">
                                        <select class="form-control attribute_info_id" name="attribute_info_id[]">
                                            <option value="">Select Attribute</option>
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    <div class="col m-1">
                                        <select class="form-control attribute_values_info_id" name="attribute_values_info_id[]">
                                            <option value="">Select Value</option>
                                        </select>
                                    </div>
                                </th>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-outline-success btn-sm add-row-item"><i class="bx bx-plus"></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary itemInfoSaveRow">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function autoResize(textarea) {
            // Reset the height to 'auto' to shrink it before expanding
            textarea.style.height = 'auto';
            // Set the height to the scrollHeight, which is the full height of the content
            textarea.style.height = textarea.scrollHeight + 'px';
        }
        window.addEventListener('load', function() {
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                autoResize(textarea);
            });
        });
        function resizeInput(input) {
            input.style.width = ((input.value.length + 1) * 8) + "px";
        }
    </script>
    <script>

        var urlss = "{{ url('showItemsDropDown') }}";
        var csrf_tokens = "{{ csrf_token() }}";
        var item_list_id = '#item_list_id';

        function addItemModal(selectElement,itemIDsInput,attributesInput,attributeValuesInput) {
            $(".modal-title").text("Add Attribute and Values");
            $("#largeModal").modal("show");
            getTheAllItem(selectElement);

            $("#largeModal").data('itemdetailsTextArea', selectElement);
            $("#largeModal").data('itemIDs', itemIDsInput);
            $("#largeModal").data('attributesInput', attributesInput);
            $("#largeModal").data('attributeValuesInput', attributeValuesInput);
        }

        function getTheAllItem(selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'item', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Item Data Get Successfully");
                    var category = $.parseJSON(data);
                    var markup = "<option value=''>Select Item</option>";
                    if (category != '') {
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(item_list_id).html(markup).show();
                    } else {
                        $(item_list_id).html("<option value=''>Select Item</option>").show();
                    }
                }
            });
        }

        function getTheAttributes(item_id, element) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_for_item', 'item_id': item_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Data Get Successfully");
                    var category = $.parseJSON(data);
                    var markup = "<option value=''>Select Attribute</option>";
                    if (category != '') {
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                    }
                    $(element).html(markup).show();
                }
            });
        }

        function getTheAttributeValues(item_id, attribute_id, element) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_value_for_item', 'item_id': item_id, 'attribute_id': attribute_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Value Data Get Successfully");
                    var category = $.parseJSON(data);
                    var markup = "<option value=''>Select Value</option>";
                    if (category != '') {
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                    }
                    $(element).html(markup).show();
                }
            });
        }

        $(document).on('change', item_list_id, function () {
            var item_id = $(this).val();
            if (item_id) {
                console.log('Item selected: ' + item_id);
                $('#rowsContainerItem').find('.attribute_info_id').each(function () {
                    getTheAttributes(item_id, this);
                });
            } else {
                console.log('No item selected');
            }
        });

        $(document).on('change', '.attribute_info_id', function () {
            var attribute_id = $(this).val();
            var item_id = $('#item_list_id').val();
            var attributeValueSelectElement = $(this).closest('tr').find('.attribute_values_info_id');
            if (attribute_id) {
                getTheAttributeValues(item_id, attribute_id, attributeValueSelectElement);
            } else {
                attributeValueSelectElement.html("<option value=''>Select Value</option>");
            }
        });

        $(document).on('click', '.add-row-item', function (e) {
            e.preventDefault();
            var newRow = `
            <tr class="text-nowrap">
                <th><button class="btn btn-sm btn-outline-danger remove-row-attribute"><i class="bx bx-trash"></i></button></th>
                <th>
                    <div class="col m-1">
                        <select class="form-control select2 attribute_info_id" name="attribute_info_id[]">
                            <option value="">Select Attribute</option>
                        </select>
                    </div>
                </th>
                <th>
                    <div class="col m-1">
                        <select class="form-control select2 attribute_values_info_id" name="attribute_values_info_id[]">
                            <option value="">Select Value</option>
                        </select>
                    </div>
                </th>
            </tr>`;

            $('#rowsContainerItem').append(newRow);
            var item_id = $('#item_list_id').val();
            if (item_id) {
                $('#rowsContainerItem').find('.attribute_info_id').last().each(function () {
                    getTheAttributes(item_id, this);
                });
            }
        });

        $(document).on('click', '.remove-row-attribute', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        $(document).on('click', '.add-row', function (e) {
            e.preventDefault();

            var newRow = `
            <tr class="dynamic-row">
                <td><button class="btn btn-sm btn-outline-danger remove-row "><i class="bx bx-trash"></i></button></td>
                <td>
                    <div class="form-group">
                        <input type="hidden" id="itemIDs" name="itemIDs[]"/>
                        <input type="hidden" id="attributes" name="attributes[]"/>
                        <input type="hidden" id="attributeValues" name="attributeValues"/>

                        <textarea oninput="autoResize(this)" type="text" readonly class="form-control form-control-text-area" name="itemdetailsTextArea[]" id="itemdetailsTextArea">Item : Item Name, Size : Item Size, Capacity : Item Capacity</textarea>
                        <input type="button" class="mt-1 btn btn-outline-info btn-sm addAttributes" value="Select Item Attribute & Values">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 cur_code1 resizable-select" id="cur_code1" name="cur_code1[]">
                            <option value="">Select</option>
                            <option value="0001">Taka</option>
                            <option value="0002">USD</option>
                            <option value="0003">Pound</option>
                            <option value="0004">Frunk</option>
                            <option value="0005">EURO</option>
                            <option value="0006">Kuwaiti Dinar</option>
                            <option value="0007">HONG KONG DOLLAR</option>
                            <option value="0008">YEN</option>
                            <option value="0009">INR</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-control select2 cur_code resizable-select" id="cur_code" name="cur_code[]">
                            <option value="">Select</option>
                            <option value="0001">Taka</option>
                            <option value="0002">USD</option>
                            <option value="0003">Pound</option>
                            <option value="0004">Frunk</option>
                            <option value="0005">EURO</option>
                            <option value="0006">Kuwaiti Dinar</option>
                            <option value="0007">HONG KONG DOLLAR</option>
                            <option value="0008">YEN</option>
                            <option value="0009">INR</option>
                        </select>
                    </div>
                </td>
                <td><input type="number" class="form-control resizable-input" name="con_rate[]" value="0" min="0" id="con_rate"  oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="unit_cost[]" value="0" min="0"  id="unit_cost" oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="qunty[]" value="0" min="0"  id="qunty" oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="amountTotal[]" value="0" min="0"  id="amountTotal" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="vat_d[]" value="0" min="0"  id="vat" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="tax_d[]" value="0" min="0"  id="tax" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="transportation_d[]" value="0" min="0"  id="transportation" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="freight_d[]" value="0" min="0"  id="freight" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="installation_d[]" value="0" min="0"  id="installation" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="other_d[]" value="0" min="0"  id="other" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="discount_d[]" value="0" min="0"  id="discount" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="item_total_cost[]" value="0" min="0"  id="item_total_cost" readonly oninput="resizeInput(this)"></td>
                <td><input type="number" class="form-control resizable-input" name="item_total_cost_bdt[]" value="0" min="0"  id="item_total_cost_bdt" readonly oninput="resizeInput(this)"></td>
            </tr>`;

            // Append the new row to the table
            $('#rowsContainer').append(newRow);

            // Re-initialize select2 for all select elements in the table
            $('#rowsContainer .select2').select2();

            // Re-initialize the event listener for the new row
            $('#rowsContainer .dynamic-row:last input').on('input', function () {
                var row = $(this).closest('tr');
                updateItemCost(row);
            });

            // Initial calculation for the newly added row
            var newRow = $('#rowsContainer .dynamic-row:last');
            updateItemCost(newRow);
        });

        $(document).on('click', '.remove-row', function (e) {
            e.preventDefault();
            if ($('#rowsContainer .dynamic-row').length > 1) {
                $(this).closest('tr').remove();
            } else {
                alert("At least one row must remain.");
            }
        });

        $(document).on('click', '.addAttributes', function () {
            var row = $(this).closest('tr');
            var itemdetailsTextArea = row.find('#itemdetailsTextArea');
            var itemIDsInput = row.find('#itemIDs');
            var attributesInput = row.find('#attributes');
            var attributeValuesInput = row.find('#attributeValues');

            addItemModal(itemdetailsTextArea,itemIDsInput,attributesInput,attributeValuesInput);
        });

        $(document).on('click', '.itemInfoSaveRow', function () {
            var item_id = $('#item_list_id').val();
            var item_name = $('#item_list_id option:selected').text();

            if (!item_id) {
                alert('Please select an item.');
                return;
            }

            var item = { name: item_name, id: item_id };
            var attributes = [];
            var attributeIds = [];
            var attributeValues = [];
            var attributeValueIds = [];
            var attributeValueIdsString ="";
                $('#rowsContainerItem').find('tr').each(function () {
                var attribute_id = $(this).find('.attribute_info_id').val();
                var attribute_name = $(this).find('.attribute_info_id option:selected').text();
                var attribute_value_id = $(this).find('.attribute_values_info_id').val();
                var attribute_value_name = $(this).find('.attribute_values_info_id option:selected').text();

                if (attribute_id && attribute_value_id) {
                    attributes.push({
                        name: attribute_name,
                        id: attribute_id
                    });
                    attributeIds.push(attribute_id); // Save only the attribute_id
                    attributeValueIds.push(attribute_value_id);
                    attributeValueIdsString = attributeValueIds.join(',');
                    console.log(attributeValueIdsString);

                    attributeValues.push({
                        name: attribute_value_name,
                        attribute_id: attribute_id,
                        id: attribute_value_id
                    });
                }
            });

            if (attributes.length === 0 || attributeValues.length === 0) {
                alert('Please select attributes and their values.');
                return;
            }

            var dataToSave = { item: item, attribute: attributes, attributevalue: attributeValues };

            var itemdetailsTextArea = $("#largeModal").data('itemdetailsTextArea');
            var itemIDsInput = $("#largeModal").data('itemIDs');
            var attributesInput = $("#largeModal").data('attributesInput');
            var attributeValuesInput = $("#largeModal").data('attributeValuesInput');

            itemdetailsTextArea.val(
                "Item : " + item.name + ", " +
                "Attribute(s) : " + attributes.map(attr => attr.name).join(", ") + ", " +
                "Value(s) : " + attributeValues.map(val => val.name).join(", ")
            );

            itemIDsInput.val(item_id);
            attributesInput.val('{' + attributeIds.join(',') + '}');
            attributeValuesInput.val(attributeValueIdsString);
            $("#largeModal form")[0].reset();

            $('#largeModal').modal('hide');
        });

        function updateItemCost(row) {
            var con_rate = parseFloat(row.find('input[name="con_rate[]"]').val()) || 0;
            var unit_cost = parseFloat(row.find('input[name="unit_cost[]"]').val()) || 0;
            var qunty = parseFloat(row.find('input[name="qunty[]"]').val()) || 0;
            var item_cost = (con_rate * unit_cost * qunty);
            row.find('input[name="amountTotal[]"]').val(item_cost.toFixed(2));
            updateVatAmount(row);
        }

        function updateVatAmount(row) {
            var vat_amount = parseFloat($('#vat').val()) || 0;
            var tax_amount = parseFloat($('#tax').val()) || 0;
            var transportation_amount = parseFloat($('#transportation').val()) || 0;
            var freight_amount = parseFloat($('#freight').val()) || 0;
            var installation_amount = parseFloat($('#installation').val()) || 0;
            var other_amount = parseFloat($('#other').val()) || 0;
            var discount_amount = parseFloat($('#discount').val()) || 0;

            var totalAmount = 0;
            $('#rowsContainer .dynamic-row').each(function () {
                var row_qnty = parseFloat($(this).find('input[name="amountTotal[]"]').val()) || 0;
                totalAmount += row_qnty;
            });
            $('#rowsContainer .dynamic-row').each(function () {
                var rowAmount = parseFloat($(this).find('input[name="amountTotal[]"]').val()) || 0;
                var rowVat = (rowAmount / totalAmount) * vat_amount;
                var rowTax = (rowAmount / totalAmount) * tax_amount;
                var rowTransportation = (rowAmount / totalAmount) * transportation_amount;
                var rowFreight = (rowAmount / totalAmount) * freight_amount;
                var rowInstallation = (rowAmount / totalAmount) * installation_amount;
                var rowOther = (rowAmount / totalAmount) * other_amount;

                $(this).find('input[name="vat_d[]"]').val(rowVat.toFixed(2));
                $(this).find('input[name="tax_d[]"]').val(rowTax.toFixed(2));
                $(this).find('input[name="transportation_d[]"]').val(rowTransportation.toFixed(2));
                $(this).find('input[name="freight_d[]"]').val(rowFreight.toFixed(2));
                $(this).find('input[name="installation_d[]"]').val(rowInstallation.toFixed(2));
                $(this).find('input[name="other_d[]"]').val(rowOther.toFixed(2));
                $(this).find('input[name="discount_d[]"]').val(rowVat.toFixed(2));
            });
        }

        $(document).on('input', 'input[name="VAT"], input[name="Tax"], input[name="Transportation"], input[name="Freight"], input[name="Installation"], input[name="Other"], input[name="Discount"]', function () {
            var row = $(this).closest('tr');
            updateItemCost(row);
        });
        $(document).on('input', 'input[name="con_rate[]"], input[name="unit_cost[]"], input[name="qunty[]"], input[name="vat[]"], input[name="atc[]"]', function () {
            var row = $(this).closest('tr');
            updateItemCost(row);
        });

        $(document).ready(function () {
            $('#rowsContainer .dynamic-row').each(function () {
                updateItemCost($(this));
            });
        });
    </script>

    <script>

        function addData() {
            var formData = new FormData($("#itemDataAdd form")[0]);
            var itemDetailsInfo = [];
            $('#rowsContainer .dynamic-row').each(function() {
                var itemIDs = $(this).find('#itemIDs').val();
                var attributes = $(this).find('#attributes').val();
                var attributeValues = $(this).find('#attributeValues').val();
                var cur_code = $(this).find('#cur_code').val();
                var con_rate = $(this).find('#con_rate').val();
                var unit_cost = $(this).find('#unit_cost').val();
                var qunty = $(this).find('#qunty').val();
                var vat = $(this).find('#vat').val();
                var atc = $(this).find('#tax').val();

                if (con_rate && unit_cost) {
                    itemDetailsInfo.push({
                                        "itemID": itemIDs,
                                        "attributes": attributes,
                                        "attributeValues": attributeValues,
                                        "cur_code": cur_code,
                                        "con_rate": con_rate,
                                        "unit_cost": unit_cost,
                                        "qunty": qunty,
                                        "vat": vat,
                                        "atc": atc
                                    });
                }
            });

            formData.append("itemDetailsInfo", JSON.stringify(itemDetailsInfo));
            var url = "{{ url('purchaseOrder') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.statusCode == 200) {
                        swal({
                            text: data.statusMsg,
                            title: "Success!",
                            icon: "success"
                        });
                        $("#itemDataAdd form")[0].reset();
                        $("#itemDataAdd .select2").trigger('change')
                        $('#rowsContainer').empty();
                        $('#usersTable').DataTable().ajax.reload();
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors);
                    } else {
                        swal({
                            text: data.statusMsg,
                            icon: "error",
                        });
                    }
                },
                error: function (data) {
                    swal({
                        text: "Internal Server Error",
                        icon: "question"
                    });
                }
            });
            return false;
        }
    </script>
@endsection
