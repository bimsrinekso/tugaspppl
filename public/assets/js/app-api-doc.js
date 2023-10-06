formatCode = (id, value, mode) => {
    let cm = CodeMirror(document.getElementById(id), {
        value: value,
        mode: mode,
        theme: 'material',
        readOnly: true,
        lineNumbers: true,
        lineWrapping: true,
        matchBrackets: true,
        autoCloseBrackets: true,
        styleActiveLine: true,
        indentUnit: 2,
        tabSize: 4,
    });
    let editorValue = cm.getValue();

    let lines = editorValue.split('\n');

    if (lines[0].trim() === '') {
        lines.shift();
        cm.setValue(lines.join('\n'));
    }

    return cm;
}

function applyCodeMirror(tabId, contentId, value, mode) {
    $(`#${tabId}`).on('shown.bs.tab', function() {
        let content = $(`#${contentId}`).find(".CodeMirror");
        if(content.length == 0){
            formatCode(contentId, value, mode);
        }
    });
}
    
$(document).ready(function() {
    applyCodeMirror('v-pills-inquirybalance-tab', 'inquiryrequest', `
    GET /api/getBalance HTTP/1.1
    Host: service.louispay.com
    apiKey: ${apiKey}
    Content-Type: application/json`, 'shell');

    applyCodeMirror('v-pills-inquirybalance-tab', 'inquiryresponse', `
    HTTP/1.1 200 OK
    Content-Type: application/json

    {
        "status": 200,
        "response": {
            "totalBlcClient": 0
        }
    }`, 'shell');

    applyCodeMirror('v-pills-generatex-tab', 'generatemd5', `
    require_once 'vendor/autoload.php';
    // composer require phpseclib/phpseclib:~3.0
    use phpseclib3\\Crypt\\RSA;
    use phpseclib3\\Crypt\\Hash;

    function md5Hash($text, $md5key) {
        $hash = hash_hmac('md5', $text, $md5key);
        return $hash;
    }
    function encrypt(){
        $sample = array(
            "senderName" => 'Vivian', 
            "amount" => '60000', 
            "orderNo" => 'DP1021323232499', 
            "callbackUrl" => 'http://localhost:3387/testCallback', 
            "payMethod" => 'qris'
        ); 
        $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
        echo $text;
        echo "\\n";
        $md5key = "${md5key}";
        echo "result hash : ";
        return md5Hash($text, $md5key);
    }

    echo encrypt();
    echo "\\n";`, 'shell');

    applyCodeMirror('v-pills-generatex-tab', 'generateheader', `x-request-hash: c8b3e67968446c498e243db803199d87`, 'shell');
    applyCodeMirror('v-pills-callback-tab', 'callbackusage',  `
    const BaseController = require("./BaseController.js");
    class CallbackController extends BaseController{
        testCallback = async (req, res) => {
            var response = {
                data: req.body,
            }
            console.log(response);
            res.status(200).json(response)
        }
    }
    module.exports = CallbackController;`, 'javascript');
    applyCodeMirror('v-pills-callback-tab', 'callbackresponse', `
    {
        data: {
            status: 200,
            messages: 'Success send Deposit',
            response: {
                amount: '50000',
                callbackUrl: 'http://localhost:3387/testCallback',
                expiredAt: '2023-08-30 18:20:07',
                orderNo: 'DP1021323232501',
                sender_name: 'Vivian',
                signature: '1477e512650d87f853e48ef7dfcf047c',
                status: 4,
                submitTime: '2023-08-30 18:05:07',
                transactionID: '2308-4133-6121-6358',
                urlDepo: 'https://louispay.com/depo/bbe99113-0576-4cd1-b655-ccd3a88adaa0'
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
                orderNo: 'DP1021323232501',
                sender_name: 'Vivian',
                signature: '16abc69d161b902cd0fa5d5c9233cbc9',
                status: 2,
                submitTime: '2023-08-30 18:05:07',
                transactionID: '2308-4133-6121-6358',
                updatedTime: '2023-08-30 18:14:09'
            }
        }
    }`, 'javascript');
    applyCodeMirror('v-pills-deposit-tab', 'depositrequest',  `
    POST /api/genUrlDepo HTTP/1.1
    Host: service.louispay.com
    apiKey: ${apiKey}
    x-request-hash: e2ab77015aebd620933df04b62a54552
    Content-Type: application/json
    {
        "senderName":"Vivian" 
        "amount":50000 
        "orderNo": "DP1021323232501" 
        "callbackUrl": "http://localhost:3387/testCallback" 
        "payMethod": "qris"
    }`, 'shell');
    applyCodeMirror('v-pills-deposit-tab', 'depositresponse', `
    HTTP/1.1 200 OK
    Content-Type: application/json
    {
        "status": 200,
        "messages": "Success send Deposit",
        "response": {
            "amount": '50000', 
            "callbackUrl": 'http://localhost:3387/testCallback', 
            "expiredAt": '2023-08-30 18:20:07', 
            "orderNo": 'DP1021323232501', 
            "sender_name": 'Vivian', 
            "signature": '1477e512650d87f853e48ef7dfcf047c', 
            "status": 4, 
            "submitTime": '2023-08-30 18:05:07', 
            "transactionID": '2308-4133-6121-6358', 
            "urlDepo": 'https://louispay.com/depo/bbe99113-0576-4cd1-b655-ccd3a88adaa0'
        }
    }`, 'shell');
    applyCodeMirror('v-pills-deposit-tab', 'depositsignature', `
    require_once 'vendor/autoload.php';
    // composer require phpseclib/phpseclib:~3.0
    use phpseclib3\\Crypt\\RSA;
    use phpseclib3\\Crypt\\Hash;

    function md5Hash($text, $md5key) {
        $hash = hash_hmac('md5', $text, $md5key);
        return $hash;
    }
    function encrypt(){
        $sample = array(
            "amount" => '50000', 
            "callbackUrl" => 'http://localhost:3387/testCallback', 
            "expiredAt" => '2023-08-30 18:20:07', 
            "orderNo" => 'DP1021323232501', 
            "sender_name" => 'Vivian', 
            "status" => 4, 
            "submitTime" => '2023-08-30 18:05:07', 
            "transactionID" => '2308-4133-6121-6358', 
            "urlDepo" => 'https://louispay.com/depo/bbe99113-0576-4cd1-b655-ccd3a88adaa0'
        ); 
        $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
        echo $text;
        echo "\\n";
        $md5key = "${md5key}";
        echo "result hash : ";  
        return md5Hash($text, $md5key);
    }

    echo encrypt();
    echo "\\n";`, 'shell');
    applyCodeMirror('v-pills-withdraw-tab', 'withdrawrequest', `
    POST /api/wd/reqWd
    Host: service.louispay.com
    apiKey: ${apiKey}
    x-request-hash: 6309ceba78137a7ae4f245e074867290
    {
        "senderName":"Vivian" 
        "amount":10000 
        "bankName":"BCA" 
        "accountNumber":"3224324" 
        "callbackUrl":"http://localhost:3387/testCallback" 
        "orderNo":"WNPKR13333777777886  "
    }`, 'shell');;

    applyCodeMirror('v-pills-withdraw-tab', 'withdrawresponse', `
    HTTP/1.1 200 OK
    Content-Type: application/json

    {
        "status": 200,
        "messages": "Success request Withdraw",
        "response": {
            "amount": '10000', 
            "callbackUrl": 'http://localhost:3387/testCallback', 
            "orderNo": 'WNPKR13333777777886', 
            "signature": 'b2aed6034109af3c20107d7c85be2806', 
            "status": 2, 
            "submitTime": '2023-08-30 18:26:48', 
            "transactionID": '2308-7115-2264-5442', 
            "updatedTime": '2023-08-30 18:26:48' 
        }
    }`, 'shell');
    applyCodeMirror('v-pills-withdraw-tab', 'withdrawsignature', `
    require_once 'vendor/autoload.php';
    // composer require phpseclib/phpseclib:~3.0
    use phpseclib3\\Crypt\\RSA;
    use phpseclib3\\Crypt\\Hash;

    function md5Hash($text, $md5key) {
        $hash = hash_hmac('md5', $text, $md5key);
        return $hash;
    }
    function encrypt(){
        $sample = array(
            "amount" => '10000', 
            "callbackUrl" => 'http://localhost:3387/testCallback', 
            "orderNo" => 'WNPKR13333777777886', 
            "status" => 2, 
            "submitTime" => '2023-08-30 18:26:48', 
            "transactionID" => '2308-7115-2264-5442', 
            "updatedTime" => '2023-08-30 18:26:48' 
        ); 
        $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
        echo $text;
        echo "\\n";
        $md5key = "${md5key}";
        echo "result hash : ";
        return md5Hash($text, $md5key);
    }

    echo encrypt();
    echo "\\n";`, 'shell')
    applyCodeMirror('v-pills-transaction-tab', 'transactionrequest', `GET /api/order/transactionStatus?type=deposit&status=2`, 'shell');
    applyCodeMirror('v-pills-transaction-tab', 'transactionresponse', `
    HTTP/1.1 200 OK
    {
        "status": 200,
        "response": [
            { 
                "lastBalance": null, 
                "memberid": "230822747718", 
                "updatedTime": "2023-08-30T09:57:04.000Z", 
                "submitTime": "2023-08-30T09:57:04.000Z", 
                "fullname": "Vivian", 
                "accNumber": null, 
                "bankName": null, 
                "holderName": null,     
                "status": "Pending", 
                "senderName": "Vivian", 
                "transactionID": "2308-6590-5112-8241", 
                "orderNo": "DP1021323232500", 
                "amountDepo": "50000", 
                "actualAmount": null, 
                "amtReceived": null, 
                "unqAmt": "49999", 
                "amtBt": null, 
                "currency": "IDR", 
                "dpOrderNo": "DP1021323232500", 
                "comission": null 
            }, 
            { 
                "lastBalance": null, 
                "memberid": "230822747718", 
                "updatedTime": "2023-08-30T10:05:07.000Z", 
                "submitTime": "2023-08-30T10:05:07.000Z", 
                "fullname": "Vivian", 
                "accNumber": null, 
                "bankName": null, 
                "holderName": null, 
                "status": "Pending", 
                "senderName": "Vivian", 
                "transactionID": "2308-4133-6121-6358", 
                "orderNo": "DP1021323232501", 
                "amountDepo": "50000", 
                "actualAmount": null, 
                "amtReceived": null, 
                "unqAmt": "49998", 
                "amtBt": null, 
                "currency": "IDR", 
                "dpOrderNo": "DP1021323232501", 
                "comission": null 
            } 
        ]`, 'shell');
    });
    