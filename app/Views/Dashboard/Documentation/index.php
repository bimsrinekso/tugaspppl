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
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/shell/shell.min.js"></script>
<script>
    $(document).ready(function() {
        $('#v-pills-inquirybalance-tab').on('shown.bs.tab', function() {
            let inReq = $('#inquiryrequest').find(".CodeMirror");
            var totalInReq = inReq.length;
            if(totalInReq == 0){
                const Inquiryrequest = CodeMirror(document.getElementById('inquiryrequest'), {
            value: `GET /api/getBalance HTTP/1.1
Host: service.noehpay.com
apiKey: f8f92c62-dcff-11ed-9445-e7654425ee39
Content-Type: application/json`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
            let inRes = $('#inquiryresponse').find(".CodeMirror");
            var totalInRes = inRes.length;
            if(totalInRes == 0){
                const Inquiryresponse = CodeMirror(document.getElementById('inquiryresponse'), {
                value: `HTTP/1.1 200 OK
Content-Type: application/json

{
    "status": 200,
    "response": {
        "totalBlcClient": 508969
    }
}`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#v-pills-generatex-tab').on('shown.bs.tab', function() {
            let inGen = $('#generatemd5').find(".CodeMirror");
            var totalInGen = inGen.length;
            if(totalInGen == 0){
                const Generatemd5 = CodeMirror(document.getElementById('generatemd5'), {
                value: `require_once 'vendor/autoload.php';
// composer require phpseclib/phpseclib:~3.0
use phpseclib3\\Crypt\\RSA;
use phpseclib3\\Crypt\\Hash;

function md5Hash($text, $key) {
    $hash = hash_hmac('md5', $text, $key);
    return $hash;
}
function encrypt(){
    $sample = array(
        "senderName" => "john",
        "amount" => "50000",
        "callbackUrl" => "http://localhost:3387/testCallback",
        "orderNo" => "1112455556567657",
        ); 
        $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
        echo $text;
        echo "\\n";
        $key = "b919f3bd-46ba-423c-b518-3e5736c11728";
        return md5Hash($text, $key);
}

echo encrypt();
echo "\\n";
// output : edf4eac616b0e2a4e67a9e79838bc0c9`,
                mode: 'shell',
                readOnly: true,
                lineNumbers: true,
                lineWrapping: true,
            });
            }
            let inGenhead = $('#generateheader').find(".CodeMirror");
            var totalInGenhead = inGenhead.length;
            if(totalInGenhead == 0){
                const Generateheader = CodeMirror(document.getElementById('generateheader'), {
                    value: `x-request-hash: edf4eac616b0e2a4e67a9e79838bc0c9`,
                    mode: 'shell',
                    readOnly: true,
                    lineNumbers: true,
                    lineWrapping: true,
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#v-pills-callback-tab').on('shown.bs.tab', function() {
            let inCall = $('#callbackusage').find(".CodeMirror");
            var totalIncall = inCall.length;
            if(totalIncall == 0){
                const Callbackusage = CodeMirror(document.getElementById('callbackusage'), {
                value: `const BaseController = require("./BaseController.js");
class CallbackController extends BaseController{
    testCallback = async (req, res) => {
        var response = {
            data: req.body,
        }
        console.log(response);
        res.status(200).json(response)
    }
}
module.exports = CallbackController;`,
                mode: 'shell',
                readOnly: true,
                lineNumbers: true,
                lineWrapping: true,
            });
            }
            let inCallres = $('#callbackresponse').find(".CodeMirror");
            var totalIncallres = inCallres.length;
            if(totalIncallres == 0){
                const Callbackresponse = CodeMirror(document.getElementById('callbackresponse'), {
            value: `{
    data: {
        status: 200,
        messages: 'Success send Deposit',
        response: {
            amount: '50000',
            callbackUrl: 'http://localhost:3387/testCallback',
            expiredAt: '2023-05-16 13:01:36',
            orderNo: '1112455556567657',
            sender_name: 'john',
            signature: 'b3086a996458f4901eb9f8b9aa210c8d',
            status: 4,
            submitTime: '2023-05-16 12:46:36',
            transactionID: '2305-3138-7819-9789',
            urlDepo: 'https://noehpay.com/depo/ed7b8699-a130-4d82-b549-5431c2afb875'
        }
    }
}
{
    data: {
        status: 200,
        messages: 'Success member send Deposit',
        response: {
            amount: '50000',
            callbackUrl: 'http://localhost:3387/testCallback',
            orderNo: '1112455556567657',
            sender_name: 'john',
            signature: '3db1e66674c7550d10505ac7dc5d6cdf',
            status: 2,
            submitTime: '2023-05-16 12:47:18',
            transactionID: '2305-3138-7819-9789',
            updatedTime: '2023-05-16 12:47:18'
        }
    }
}`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#v-pills-deposit-tab').on('shown.bs.tab', function() {
            let inDepo = $('#depositrequest').find(".CodeMirror");
            var totalIndepo = inDepo.length;
            if(totalIndepo == 0){
                const Depositrequest = CodeMirror(document.getElementById('depositrequest'), {
                value: `POST /api/genUrlDepo HTTP/1.1
Host: service.noehpay.com
apiKey: f8f92c62-dcff-11ed-9445-e7654425ee39
x-request-hash: ad5f2e44dd349d0c39d2230e865511c1
Content-Type: application/json
{
    "senderName":"john"
    "amount":50000
    "callbackUrl": "http://localhost:3387/testCallback"
    "queryUrl": "http://localhost:3387/testQuery"
    "orderNo": "1112455556567657"
}`,
                mode: 'shell',
                readOnly: true,
                lineNumbers: true,
                lineWrapping: true,
            });
            }
            let inDepores = $('#depositresponse').find(".CodeMirror");
            var totalIndepores = inDepores.length;
            if(totalIndepores == 0){
                const Depositresponse = CodeMirror(document.getElementById('depositresponse'), {
            value: `HTTP/1.1 200 OK
Content-Type: application/json
{
    "status": 200,
    "messages": "Success send Deposit",
    "response": {
        "amount": "50000",
        "callbackUrl": "http://localhost:3387/testCallback",
        "expiredAt": "2023-05-16 14:46:01",
        "orderNo": "1112455556567657",
        "sender_name": "john",
        "signature": "3e84dfcfc385b95d9c89ea6782641dd4",
        "status": 4,
        "submitTime": "2023-05-16 14:31:01"
        "transactionID": "2305-4529-0721-8225",
        "urlDepo": "https://noehpay.com/depo/d775c7dd-8ecd-4de6-9759-1ac3db898f84"
    }
}`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
            let inDeposig = $('#depositsignature').find(".CodeMirror");
            var totalIndeposig = inDeposig.length;
            if(totalIndeposig == 0){
                const Depositsignature = CodeMirror(document.getElementById('depositsignature'), {
            value: `require_once 'vendor/autoload.php';
// composer require phpseclib/phpseclib:~3.0
use phpseclib3\\Crypt\\RSA;
use phpseclib3\\Crypt\\Hash;

function md5Hash($text, $key) {
    $hash = hash_hmac('md5', $text, $key);
    return $hash;
}
function encrypt(){
    $sample = array(
        "amount" => '50000',
        "callbackUrl" => 'http://localhost:3387/testCallback',
        "expiredAt" => '2023-05-16 22:44:37',
        "orderNo" => '1112455556567657',
        "sender_name" => 'john',
        "status" => 4,
        "submitTime" => '2023-05-16 22:29:37',
        "transactionID" => '2305-9759-1336-3573',
        "urlDepo" => 'https://noehpay.com/depo/c375fa08-c047-47b9-823f-f545b831e189'
    ); 
    $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
    echo $text;
    echo "\\n";
    $key = "b919f3bd-46ba-423c-b518-3e5736c11728";
    return md5Hash($text, $key);
}

echo encrypt();
echo "\\n";
// output : 50747c077dd7bf4a5a99044c76ac0d09`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
        });
    });
    
</script>

<script>
    $(document).ready(function() {
        $('#v-pills-withdraw-tab').on('shown.bs.tab', function() {
            let inWith = $('#withdrawrequest').find(".CodeMirror");
            var totalInwith = inWith.length;
            if(totalInwith == 0){
                 const Withdrawrequest = CodeMirror(document.getElementById('withdrawrequest'), {
                value: `POST /api/wd/reqWd
Host: service.noehpay.com
apiKey: f8f92c62-dcff-11ed-9445-e7654425ee39
x-request-hash: 6bdf4fdcd5c8a861d0a882b805d286fd
{
    "senderName":"John"
    "amount":50000
    "bankName":"Kookmin Bank"
    "accountNumber":"3224324"
    "callbackUrl":"http://localhost:3387/testCallback"
    "orderNo":"325346434353543"
}`,
                mode: 'shell',
                readOnly: true,
                lineNumbers: true,
                lineWrapping: true,
            });
            }
            let inWithres = $('#withdrawresponse').find(".CodeMirror");
            var totalInwithres = inWithres.length;
            if(totalInwithres == 0){
                const Withdrawresponse = CodeMirror(document.getElementById('withdrawresponse'), {
            value: `HTTP/1.1 200 OK
Content-Type: application/json

{
    "status": 200,
    "messages": "Success request Withdraw",
    "response": {
        "amount": "50000",
        "callbackUrl": "http://localhost:3387/testCallback",
        "orderNo": "325346434353543",
        "signature": "7ef176c9c62328c971d22b570782fbb9",
        "status": 2,
        "submitTime": "2023-05-16 16:10:41",
        "transactionID": "2305-4993-2256-5133",
        "updatedTime": "2023-05-16 16:10:41"
    }
}`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
            let inWithsig = $('#withdrawsignature').find(".CodeMirror");
            var totalInwithsig = inWithsig.length;
            if(totalInwithsig == 0){
                const Withdrawsignature = CodeMirror(document.getElementById('withdrawsignature'), {
            value: `// data signature : 7ef176c9c62328c971d22b570782fbb9
// body
{
    "amount": "50000",
    "callbackUrl": "http://localhost:3387/testCallback",
    "orderNo": "325346434353543",
    "status": 2,
    "submitTime": "2023-05-16 16:10:41",
    "transactionID": "2305-4993-2256-5133",
    "updatedTime": "2023-05-16 16:10:41"
}

// signature
require_once 'vendor/autoload.php';
// composer require phpseclib/phpseclib:~3.0
use phpseclib3\\Crypt\\RSA;
use phpseclib3\\Crypt\\Hash;

function md5Hash($text, $key) {
    $hash = hash_hmac('md5', $text, $key);
    return $hash;
}
function encrypt(){
    $sample = array(
        "amount" => "50000",
        "callbackUrl" => "http://localhost:3387/testCallback",
        "orderNo" => "325346434353543",
        "status" => 2,
        "submitTime" => "2023-05-16 16:10:41",
        "transactionID" => "2305-4993-2256-5133",
        "updatedTime" => "2023-05-16 16:10:41"
    ); 
    $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
    $key = "b919f3bd-46ba-423c-b518-3e5736c11728";
    return md5Hash($text, $key);
}

echo encrypt();
echo "\\n";
// output : 7ef176c9c62328c971d22b570782fbb9`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
        });
    });
    
</script>

<script>
    $(document).ready(function() {
        $('#v-pills-transaction-tab').on('shown.bs.tab', function() {
            let inTrans = $('#transactionrequest').find(".CodeMirror");
            var totalIntrans = inTrans.length;
            if(totalIntrans == 0){
                const Transactionrequest = CodeMirror(document.getElementById('transactionrequest'), {
                    value: `GET /api/order/transactionStatus?type=deposit&status=1`,
                    mode: 'shell',
                    readOnly: true,
                    lineNumbers: true,
                    lineWrapping: true,
                });
            }
            let inTransres = $('#transactionresponse').find(".CodeMirror");
            var totalIntransres = inTransres.length;
            if(totalIntransres == 0){
                 const Transactionresponse = CodeMirror(document.getElementById('transactionresponse'), {
            value: `HTTP/1.1 200 OK
{
    "status": 200,
    "response": [
        {
            "lastBalance": "771456",
            "memberid": "221217707427",
            "updatedTime": "2023-01-08T17:00:47.000Z",
            "submitTime": "2023-01-08T17:00:33.000Z",
            "fullname": "Falcon",
            "vaNumber": "32432423",
            "bank": "Bank Mandiri",
            "holderName": "Dahni",
            "status": "Confirmed",
            "senderName": "Dika Wijaya Kusuma",
            "transactionID": "2301-2034-3498-3015",
            "orderNo": null,
            "amountDepo": "100000",
            "actualAmount": "100000",
            "amtVa": "1000",
            "currency": "KRW"
        },
        {
            "lastBalance": "771456",
            "memberid": "221217707427",
            "updatedTime": "2023-02-06T16:17:57.000Z",
            "submitTime": "2023-02-06T16:17:51.000Z",
            "fullname": "Falcon",
            "vaNumber": "32432423",
            "bank": "Bank Mandiri",
            "holderName": "Dahni",
            "status": "Confirmed",
            "senderName": "Dika",
            "transactionID": "2302-3718-2439-5860",
            "orderNo": null,
            "amountDepo": "40000",
            "actualAmount": "50000",
            "amtVa": "500",
            "currency": "KRW"
        }
    ]`,
            mode: 'shell',
            readOnly: true,
            lineNumbers: true,
            lineWrapping: true,
            });
            }
        });
    });
    
</script>
<?php $this->endSection();?>