<?php $this->extend('Inc/main');?>
<?php $this->section('css');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" />
<style>
    .CodeMirror{
        height:auto !important;
    }
    thead.green{
        background-color: #c3e6cb;
    }
    thead.blue{
        background-color: #b8daff;
    }
    th{
        text-align: center!important;
        vertical-align: middle!important;
    }
    td{
        text-align: center!important;
        vertical-align: middle!important;
    }
    .codemirror-container {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
</style>
<?php $this->endSection();?>
<?php $this->section('isKonten');?>
<div class="page-content">
    <div class="container-fluid">
         <div class="row">
             <div>
                 <h5 class="mb-3">API Documentation</h5>
             </div>
            <div class="col-md-9">
                <div class="card px-5 py-4">
                    <div class="tab-content text-muted mt-md-0" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-introduction" role="tabpanel" aria-labelledby="v-pills-introduction-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Introduction</h5>
                                <p>
                                    This documentation provides guidelines for the usage of the Client API Key. The Client API Key is a unique code that allows clients to access specific services provided by an application or website. This documentation will explain how to obtain, protect, and use the Client API Key
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-apikeyandurl" role="tabpanel" aria-labelledby="v-pills-apikeyandurl-tab">
                            <div>
                                <h5 class="mb-3 mt-1">API Key and URL</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="green">
                                            <tr>
                                                <th scope="col">Url</th>
                                                <th scope="col">Client Api Key</th>
                                                <th scope="col">Md5key</th>
                                                <th scope="col">User ID/Merchant ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>service.noehpay.com</td>
                                                <td>f8f92c62-dcff-11ed-9445-e7654425ee39</td>
                                                <td>b919f3bd-46ba-423c-b518-3e5736c11728</td>
                                                <td>230360582895</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-1">Request</h5>
                                <h6 class="mb-3 mt-1">Header</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>apiKey</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>API Key for authentication</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-inquirybalance" role="tabpanel" aria-labelledby="v-pills-inquirybalance-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Inquiry Balance</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="green">
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Endpoint</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>GET</td>
                                                <td>/api/getBalance</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-1">Request</h5>
                                <h6 class="mb-3 mt-1">Header</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>apiKey</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>API Key for authentication</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-4">Example Request</h6>
                                <div id="inquiryrequest" class="codemirror-container"></div>
                                <h6 class="mb-3 mt-4">Example Response</h6>
                                <div id="inquiryresponse" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-generatex" role="tabpanel" aria-labelledby="v-pills-generatex-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Generate x-request-hash</h5>
                                <p>
                                    Upon receiving the encrypted data, which has been secured using MD5 please include this information as a header in the request. The header should be named "x-request-hash".
                                </p>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-4">Example Generate MD5</h5>
                                <div id="generatemd5" class="codemirror-container"></div>
                                <h5 class="mb-3 mt-4">Example Header x-request-hash</h5>
                                <div id="generateheader" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-callback" role="tabpanel" aria-labelledby="v-pills-callback-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Callback and Query</h5>
                                <p>
                                    The data object from Callback and Query comprises two properties: status, messages and response.
                                </p>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-4">Example Usage</h5>
                                <div id="callbackusage" class="codemirror-container"></div>
                                <h5 class="mb-3 mt-4">Example Response</h5>
                                <div id="callbackresponse" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-deposit" role="tabpanel" aria-labelledby="v-pills-deposit-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Deposit</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="green">
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Endpoint</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>POST</td>
                                                <td>/api/getUrlDepo</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-1">Request</h5>
                                <h6 class="mb-3 mt-1">Header</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>apiKey</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>API Key for authentication</td>
                                            </tr>
                                            <tr>
                                                <td>x-request-hash</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>hash of the request body</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-1">Body</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>senderName</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Full name of sender</td>
                                            </tr>
                                            <tr>
                                                <td>amount</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Amount of the deposit</td>
                                            </tr>
                                            <tr>
                                                <td>callbackUrl</td>
                                                <td>String</td>
                                                <td>No</td>
                                                <td>URL where the callback notification will be sent</td>
                                            </tr>
                                            <tr>
                                                <td>orderNo</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Order number</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-4">Example Request</h6>
                                <div id="depositrequest" class="codemirror-container"></div>
                                <h6 class="mb-3 mt-4">Example Response</h6>
                                <div id="depositresponse" class="codemirror-container"></div>
                            </div>
                            <div>
                                <p class="mt-4">Information, for status Deposit we have 4 status:</p>
                                <ol>
                                    <li>Confirmed</li>
                                    <li>Pending</li>
                                    <li>Rejected</li>
                                    <li>Unpaid</li>
                                </ol>
                                <p class="mt-4">
                                    Eliminate signature parameter in the parameter set, and the key value of the first character of the parameter (not the value corresponding to the parameter) is sorted in ascending order according to the ASCII code, and if the same character is encountered, the key value of the second character is used ASCII code ascending sort.
                                </p>
                                <p>signature example</p>
                                <div id="depositsignature" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-withdraw" role="tabpanel" aria-labelledby="v-pills-withdraw-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Withdraw</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="green">
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Endpoint</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>POST</td>
                                                <td>/api/wd/reqWd</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-1">Request</h5>
                                <h6 class="mb-3 mt-1">Header</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>apiKey</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>API Key for authentication</td>
                                            </tr>
                                            <tr>
                                                <td>x-request-hash</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>hash of the request body</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-1">Body</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>senderName</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Full name of sender</td>
                                            </tr>
                                            <tr>
                                                <td>amount</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Amount of the withdraw</td>
                                            </tr>
                                            <tr>
                                                <td>bankName</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Name of the bank</td>
                                            </tr>
                                            <tr>
                                                <td>accountNumber</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Bank Account Number</td>
                                            </tr>
                                            <tr>
                                                <td>callbackUrl</td>
                                                <td>String</td>
                                                <td>Optional</td>
                                                <td>URL where the callback notification will be sent</td>
                                            </tr>
                                            <tr>
                                                <td>orderNo</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Order number</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-4">Example Request</h6>
                                <div id="withdrawrequest" class="codemirror-container"></div>
                                <h6 class="mb-3 mt-4">Example Response</h6>
                                <div id="withdrawresponse" class="codemirror-container"></div>
                            </div>
                            <div>
                                <p class="mt-4">Information, for Withdraw status we have 3 status:</p>
                                <ol>
                                    <li>Confirmed</li>
                                    <li>Pending</li>
                                    <li>Rejected</li>
                                </ol>
                                <p class="mt-4">
                                    Eliminate signature parameter in the parameter set, and the key value of the first character of the parameter (not the value corresponding to the parameter) is sorted in ascending order according to the ASCII code, and if the same character is encountered, the key value of the second character is used ASCII code ascending sort.
                                </p>
                                <p>signature example</p>
                                <div id="withdrawsignature" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel" aria-labelledby="v-pills-transaction-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Transaction Status</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="green">
                                            <tr>
                                                <th scope="col">Method</th>
                                                <th scope="col">Endpoint</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>GET</td>
                                                <td>/api/order/transactionStatus</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3 mt-1">Request</h5>
                                <h6 class="mb-3 mt-1">Header</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>apiKey</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>API Key for authentication</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-1">Query Parameters</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="blue">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Required</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>orderNo</td>
                                                <td>String</td>
                                                <td>No</td>
                                                <td>Order Number</td>
                                            </tr>
                                            <tr>
                                                <td>startDate</td>
                                                <td>String</td>
                                                <td>No</td>
                                                <td>Start date to filter transactions</td>
                                            </tr>
                                            <tr>
                                                <td>endDate</td>
                                                <td>String</td>
                                                <td>No</td>
                                                <td>End date to filter transactions</td>
                                            </tr>
                                            <tr>
                                                <td>type</td>
                                                <td>String</td>
                                                <td>Yes</td>
                                                <td>Type of transaction (deposit or withdrawal)</td>
                                            </tr>
                                            <tr>
                                                <td>status</td>
                                                <td>String</td>
                                                <td>No</td>
                                                <td>
                                                    Status of the transaction (1, 2, 3) <br>
                                                    1 = Pending <br>
                                                    2 = Confirmed <br>
                                                    3 = Rejected 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mb-3 mt-4">Example Request</h6>
                                <div id="transactionrequest" class="codemirror-container"></div>
                                <h6 class="mb-3 mt-4">Example Response</h6>
                                <div id="transactionresponse" class="codemirror-container"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-bankname" role="tabpanel" aria-labelledby="v-pills-bankname-tab">
                            <div>
                                <h5 class="mb-3 mt-1">Bank Name</h5>
                                <p>
                                    The following is a list of bank names that we accept:
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Bank Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bank of Korea</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Korea Development Bank</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Industrial Bank of Korea</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Kookmin Bank</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>NFFC Bank</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>The Export-Import Bank of Korea</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Nonghyup Bank</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Nonghyup Local Cooperatives</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Woori Bank</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Standard Chartered Bank Korea Limited</td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Citibank Korea</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Daegu Bank</td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td>Busan Bank</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>Kwangju Bank</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>Jeju Bank</td>
                                            </tr>
                                            <tr>
                                                <td>16</td>
                                                <td>Jeonbuk Bank</td>
                                            </tr>
                                            <tr>
                                                <td>17</td>
                                                <td>Kyongnam Bank</td>
                                            </tr>
                                            <tr>
                                                <td>18</td>
                                                <td>KFCC BANK</td>
                                            </tr>
                                            <tr>
                                                <td>19</td>
                                                <td>National Credit Union Federation of Korea</td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>Federation of Savings Bank</td>
                                            </tr>
                                            <tr>
                                                <td>21</td>
                                                <td>Korea Post Office</td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>Hana Bank</td>
                                            </tr>
                                            <tr>
                                                <td>23</td>
                                                <td>Shinhan Bank</td>
                                            </tr>
                                            <tr>
                                                <td>24</td>
                                                <td>K Bank</td>
                                            </tr>
                                            <tr>
                                                <td>25</td>
                                                <td>KakaoBank</td>
                                            </tr>
                                            <tr>
                                                <td>26</td>
                                                <td>TossBank</td>
                                            </tr>
                                            <tr>
                                                <td>27</td>
                                                <td>Yuanta Securities Korea</td>
                                            </tr>
                                            <tr>
                                                <td>28</td>
                                                <td>Hyundai Securities</td>
                                            </tr>
                                            <tr>
                                                <td>29</td>
                                                <td>Mirae Asset Securities</td>
                                            </tr>
                                            <tr>
                                                <td>30</td>
                                                <td>Samsung Securities</td>
                                            </tr>
                                            <tr>
                                                <td>31</td>
                                                <td>Korea Investment & Securities</td>
                                            </tr>
                                            <tr>
                                                <td>32</td>
                                                <td>Kyobo Securities</td>
                                            </tr>
                                            <tr>
                                                <td>33</td>
                                                <td>Hi Investment & Securities</td>
                                            </tr>
                                            <tr>
                                                <td>34</td>
                                                <td>Hyundai Motor Securities</td>
                                            </tr>
                                            <tr>
                                                <td>35</td>
                                                <td>Kiwoom Securities</td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td>eBEST Investment & Securities</td>
                                            </tr>
                                            <tr>
                                                <td>37</td>
                                                <td>SK Securities</td>
                                            </tr>
                                            <tr>
                                                <td>38</td>
                                                <td>Daishin Securities</td>
                                            </tr>
                                            <tr>
                                                <td>39</td>
                                                <td>I'M Investment & Securities</td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>Hanhwa Investment & Securities</td>
                                            </tr>
                                            <tr>
                                                <td>41</td>
                                                <td>Hana Securities</td>
                                            </tr>
                                            <tr>
                                                <td>42</td>
                                                <td>Shinhan Securities</td>
                                            </tr>
                                            <tr>
                                                <td>43</td>
                                                <td>DB Financial Investment</td>
                                            </tr>
                                            <tr>
                                                <td>44</td>
                                                <td>EUGENE INVESTMENT & SECURITIES</td>
                                            </tr>
                                            <tr>
                                                <td>45</td>
                                                <td>Meritz Securities</td>
                                            </tr>
                                            <tr>
                                                <td>46</td>
                                                <td>Kakaopay Securities </td>
                                            </tr>
                                            <tr>
                                                <td>47</td>
                                                <td> BOOKOOK Securities</td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>SHINYOUNG SECURITIES</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card py-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" id="v-pills-introduction-tab" data-bs-toggle="pill" href="#v-pills-introduction" role="tab" aria-controls="v-pills-introduction" aria-selected="true">Introduction</a>
                        <a class="nav-link mb-2" id="v-pills-apikeyandurl-tab" data-bs-toggle="pill" href="#v-pills-apikeyandurl" role="tab" aria-controls="v-pills-apikeyandurl" aria-selected="false">API Key and URL</a>
                        <a class="nav-link mb-2" id="v-pills-inquirybalance-tab" data-bs-toggle="pill" href="#v-pills-inquirybalance" role="tab" aria-controls="v-pills-inquirybalance" aria-selected="false">Inquiry Balance</a>
                        <a class="nav-link" id="v-pills-generatex-tab" data-bs-toggle="pill" href="#v-pills-generatex" role="tab" aria-controls="v-pills-generatex" aria-selected="false">Generate x-request-hash</a>
                        <a class="nav-link" id="v-pills-callback-tab" data-bs-toggle="pill" href="#v-pills-callback" role="tab" aria-controls="v-pills-callback" aria-selected="false">Callback and Query</a>
                        <a class="nav-link" id="v-pills-deposit-tab" data-bs-toggle="pill" href="#v-pills-deposit" role="tab" aria-controls="v-pills-deposit" aria-selected="false">Deposit</a>
                        <a class="nav-link" id="v-pills-withdraw-tab" data-bs-toggle="pill" href="#v-pills-withdraw" role="tab" aria-controls="v-pills-withdraw" aria-selected="false">Withdraw</a>
                        <a class="nav-link" id="v-pills-transaction-tab" data-bs-toggle="pill" href="#v-pills-transaction" role="tab" aria-controls="v-pills-transaction" aria-selected="false">Transaction Status</a>
                        <a class="nav-link" id="v-pills-bankname-tab" data-bs-toggle="pill" href="#v-pills-bankname" role="tab" aria-controls="v-pills-bankname" aria-selected="false">Bank Name</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php $this->endSection();?>
<?php $this->section('javascript');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.58.3/mode/php/php.min.js"></script>
<script src="/assets/js/app-api-doc.js"></script>
<script>
    var apiKey = '<?=$dataKey->apiKey == null ? "-" : $dataKey->apiKey?>';
    var md5key = '<?=$dataKey->md5key == null ? "-" : $dataKey->md5key?>';
</script>
<?php $this->endSection();?>