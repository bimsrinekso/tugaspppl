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
    Host: service.noehpay.com
    apiKey: ${apiKey}
    Content-Type: application/json`, 'shell');

    applyCodeMirror('v-pills-inquirybalance-tab', 'inquiryresponse', `
    HTTP/1.1 200 OK
    Content-Type: application/json

    {
        "status": 200,
        "response": {
            "totalBlcClient": 508969
        }
    }`, 'shell');

    applyCodeMirror('v-pills-generatex-tab', 'generatemd5', `
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
            "senderName" => "john",
            "amount" => "50000",
            "callbackUrl" => "http://localhost:3387/testCallback",
            "orderNo" => "1112455556567657",
            ); 
            $text = json_encode($sample, JSON_UNESCAPED_SLASHES);
            echo $text;
            echo "\\n";
            $key = "${md5key}";
            return md5Hash($text, $key);
    }

    echo encrypt();
    echo "\\n";`, 'shell');

    applyCodeMirror('v-pills-generatex-tab', 'generateheader', `x-request-hash: edf4eac616b0e2a4e67a9e79838bc0c9`, 'shell');
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
    }`, 'javascript');
    applyCodeMirror('v-pills-deposit-tab', 'depositrequest',  `
    POST /api/genUrlDepo HTTP/1.1
    Host: service.noehpay.com
    apiKey: ${apiKey}
    x-request-hash: ad5f2e44dd349d0c39d2230e865511c1
    Content-Type: application/json
    {
        "senderName":"john"
        "amount":50000
        "callbackUrl": "http://localhost:3387/testCallback"
        "queryUrl": "http://localhost:3387/testQuery"
        "orderNo": "1112455556567657"
    }`, 'shell');
    applyCodeMirror('v-pills-deposit-tab', 'depositresponse', `
    HTTP/1.1 200 OK
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
    }`, 'shell');
    applyCodeMirror('v-pills-deposit-tab', 'depositsignature', `
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
        $key = "${md5key}";
        return md5Hash($text, $key);
    }

    echo encrypt();
    echo "\\n";`, 'shell');
    applyCodeMirror('v-pills-withdraw-tab', 'withdrawrequest', `
    POST /api/wd/reqWd
    Host: service.noehpay.com
    apiKey: ${apiKey}
    x-request-hash: 6bdf4fdcd5c8a861d0a882b805d286fd
    {
        "senderName":"John"
        "amount":50000
        "bankName":"Kookmin Bank"
        "accountNumber":"3224324"
        "callbackUrl":"http://localhost:3387/testCallback"
        "orderNo":"325346434353543"
    }`, 'shell');;

    applyCodeMirror('v-pills-withdraw-tab', 'withdrawresponse', `
    HTTP/1.1 200 OK
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
    }`, 'shell');
    applyCodeMirror('v-pills-withdraw-tab', 'withdrawsignature', `
    // data signature : 7ef176c9c62328c971d22b570782fbb9
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
            $key = "${md5key}";
            return md5Hash($text, $key);
        }

        echo encrypt();
        echo "\\n";`, 'shell')
        applyCodeMirror('v-pills-transaction-tab', 'transactionrequest', `GET /api/order/transactionStatus?type=deposit&status=1`, 'shell');
        applyCodeMirror('v-pills-transaction-tab', 'transactionresponse', `
        HTTP/1.1 200 OK
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
            ]`, 'shell');
    });
    