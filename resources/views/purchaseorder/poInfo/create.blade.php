@section('title',"PO Create")
@extends('layout.app')
@section('style')
    <style>
        .select2-container .select2-selection--single {
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
    </style>
@endsection
@section('main')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" id="itemDataAdd">
                        <h4 class="card-title">Item Create</h4>
                        <p class="card-description">
                            Basic form elements
                        </p>
                        <form class="forms-sample">@csrf
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="purchase_order_no">Purchase Order No</label>
                                    <input type="text" class="form-control" name="purchase_order_no" id="purchase_order_no" placeholder="John Doe" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="purchase_order_date">Purchase Order Date</label>
                                    <input type="text" class="form-control" name="purchase_order_date" id="purchase_order_date" placeholder="ACME Inc." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label class="form-label" for="lc_number">LC Number</label>
                                    <input type="text" class="form-control" name="lc_number" id="lc_number" placeholder="John Doe" />
                                </div>
                                <div class="col m-1">
                                    <label class="form-label" for="lc_date">LC Date</label>
                                    <input type="text" class="form-control" name="lc_date" id="lc_date" placeholder="ACME Inc." />
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
                                <div class="col m-1">
                                    <label for="department_id">Department</label>
                                    <select class="form-control select2" name="department_id" id="department_id">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-1">
                                    <label for="purchase_type">Purchase Type</label>
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
                                    <label for="origin">Purchase Order Origin</label>
                                    <select class="form-control select2" name="origin" id="origin">
                                        <option value="">Select Purchase Order Origin</option>
                                        <option value="F">Foreign</option>
                                        <option value="L">Local</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group table-responsive" id="itemSpack">
                                <label for="origin">PO Item Details</label>
                                <div class="table-responsive text-nowrap">
                                    <table id="usersTables" class="table">
                                        <thead>
                                        <tr class="text-nowrap">
                                            <th>#</th>
                                            <th>Item , Attribute,Attribute Value</th>
                                            <th>Currency</th>
                                            <th>Conv. Rate</th>
                                            <th>Unit Cost</th>
                                            <th>Qty</th>
                                            <th>Vat</th>
                                            <th>ATC</th>
                                            <th>Item Cost</th>
                                        </tr>
                                        </thead>
                                        <tbody id="rowsContainer">
                                        <!-- New rows will be inserted here dynamically -->
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
                    <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        @csrf
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
                        <table id="usersTables" class="table">
                            <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Item</th>
                                <th>Attribute</th>
                                <th>Attribute Value</th>
                            </tr>
                            </thead>
                            <tbody id="rowsContainerItem">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-outline-success btn-sm add-row-item"><i class='bx bx-plus'></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRoleForm" class="row g-3" onsubmit="return false">
                        @csrf
                        <input type="hidden" name="id" id="id"/>
                        <table id="usersTables" class="table">
                            <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>Item</th>
                                <th>Attribute</th>
                                <th>Attribute Value</th>
                            </tr>
                            </thead>
                            <tbody id="rowsContainerItem">
                            <!-- New rows will be inserted here dynamically -->
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-outline-success btn-sm add-row-item"><i class='bx bx-plus'></i></button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="addData()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        var urlss = "{{ url('showItemsDropDown') }}";
        var csrf_tokens = "{{ csrf_token() }}";

        function loadItem(selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'item', "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Item Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Item</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();
                    } else {
                        var markup = "<option value=''>Select Item</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }
        function loadAttributes(item_id,selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_for_item','item_id': item_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "<option value=''>Select Attribute</option>";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();
                    } else {
                        var markup = "<option value=''>Select Attribute</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }
        function loadAttributeValues(item_id,attribute_id, selectElement) {
            $.ajax({
                url: urlss,
                type: 'GET',
                data: {'ViewType': 'attribute_value_for_item','item_id': item_id, 'attribute_id': attribute_id, "_token": csrf_tokens},
                datatype: 'JSON',
                success: function (data) {
                    console.log("Attribute Value Data Get Successfully");
                    var category = $.parseJSON(data);
                    if (category != '') {
                        var markup = "";
                        for (var x = 0; x < category.length; x++) {
                            markup += "<option value=" + category[x].id + ">" + category[x].name + "</option>";
                        }
                        $(selectElement).html(markup).show();
                    } else {
                        var markup = "<option value=''>No Attribute Found</option>";
                        $(selectElement).html(markup).show();
                    }
                }
            });
        }

        $(document).ready(function() {
            $(document).on('click', '.add-row', function(e) {
                e.preventDefault();
                var newRow = `
                    <tr class="dynamic-row">
                        <td><button class="btn btn-sm btn-outline-danger remove-row "><i class='bx bx-trash' ></i></button></td>
                        <td>
                            <div class="form-group">
                                <input type="button" class="btn btn-outline-info btn-sm addAttributes" value="Select Item Attribute & Values">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <select class="form-control select2 cur_code" name="cur_code[]">
                                    <option value="">Select</option>
                                    <option value="0001">Taka</option>
                                    <option value="0002">USD</option>
                                    <option value="0003">Pound</option>
                                    <option value="0004">Frunk</option>
                                    <option value="0005">EURO</option>
                                    <option value="0006">Kuwati  Diner</option>
                                    <option value="0007">HONG KONG DOLLAR</option>
                                    <option value="0008">YEN</option>
                                    <option value="0009">INR</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="con_rate[]" value="0" id="con_rate" placeholder="Qty" />
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="unit_cost[]" value="0" id="unit_cost" placeholder="Qty" />
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="qunty" value="0" id="qunty" placeholder="Qty" />
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="vat" value="0" id="vat" placeholder="Vat" />
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="atc" value="0" id="atc" placeholder="ATC" />
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" class="form-control" name="purchase_order_date" value="0" id="purchase_order_date" placeholder="Qty" />
                            </div>
                        </td>
                    </tr>`;
                $('#rowsContainer').append(newRow);
                loadItem($('#rowsContainer .dynamic-row:last .item_id'));
                $('#rowsContainer .dynamic-row:last .select2').select2();

            });
            $(document).on('click', '.add-row-item', function(e) {
                e.preventDefault();
                var newRow = `
                    <tr class="dynamic-row">
                        <td><button class="btn btn-sm btn-outline-danger remove-row "><i class='bx bx-trash' ></i></button></td>
                        <td>
                            <div class="form-group" for="purchase_types">
                                <select class="form-control select2" name="purchase_types" id="purchase_types">
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
                        </td>
                        <td>
                            <div class="form-group">
                                <select class="form-control select2 attribute_id" name="attribute_id[]">
                                    <!-- This will be populated by loadAttributes() -->
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select class="form-control select2 attribute_values_id"  name="attribute_values_id[]">
                                    <!-- This will be populated by loadAttributeValues() -->
                                </select>
                            </div>
                        </td>
                    </tr>`;
                $('#rowsContainerItem').append(newRow);
                loadItem($('#rowsContainerItem .dynamic-row:last .item_ids'));
                $('#rowsContainerItem .dynamic-row:last .select2').select2();

            });

            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault();
                if ($('#rowsContainerItem .dynamic-row').length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    alert("At least one row must remain.");
                }
            });
            $(document).on('click', '.remove-row', function(e) {
                e.preventDefault();
                if ($('#rowsContainer .dynamic-row').length > 1) {
                    $(this).closest('tr').remove();
                } else {
                    alert("At least one row must remain.");
                }
            });

            $(document).on('change', '.item_ids', function () {
                console.log("Item ID Changed");
                var item_id = this.value;
                var row = $(this).closest('tr');
                loadAttributes(item_id, row.find('.attribute_id'));
            });

            $(document).on('click', '.addAttributes', function () {
                var attribute_id = this.value;
                var row = $(this).closest('tr');
                var item_id = row.find('.item_id').val();
                addAttributes(item_id);
                console.log("Item ID: " + item_id + ", Attribute ID: " + attribute_id);
            });

            /*$(document).on('change', '.attribute_id', function () {
                var attribute_id = this.value;
                var row = $(this).closest('tr');
                var item_id = row.find('.item_id').val();
                loadAttributeValues(item_id, attribute_id, row.find('.attribute_values_id'));
                console.log("Item ID: " + item_id + ", Attribute ID: " + attribute_id);
            });*/

        });

        function  addAttributes(id){
            $("#addModal form")[0].reset();
            $(".modal-title").text("Add Attribute and Values");
            $("#largeModal").modal("show");
            $('#id').val(id);
        }
    </script>

    <script>
        function addData() {
           /* // Get form data
            var formData = new FormData($("#itemDataAdd form")[0]);

            // Get the dynamic rows (attributes)
            var attributes = [];
            $('#rowsContainer .dynamic-row').each(function() {
                var attribute_id = $(this).find('.attribute_ids').val(); // Get the selected attribute_id
                var attribute_values_id = $(this).find('.attribute_values_id').val(); // Get the selected attribute_values_id as array

                if (attribute_id && attribute_values_id) {
                    attributes.push({
                        "attribute_ids": attribute_id,
                        "attribute_values_id": attribute_values_id // Ensure this is an array
                    });
                }
            });

            // Append the attribute array to the form data
            formData.append("attribute", JSON.stringify(attributes));*/
            var formData = new FormData($("#itemDataAdd form")[0]);

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
                        $("#itemDataAdd form")[0].reset(); // Reset the form
                        $('#rowsContainer').empty(); // Clear the rows container
                        $('#usersTable').DataTable().ajax.reload(); // Reload the DataTable
                    } else if (data.statusCode == 204) {
                        showErrors(data.errors); // Handle validation errors
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: data.statusMsg,
                        });
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
            return false; // Prevent default form submission
        }
    </script>
@endsection
