<?php
/**
 * @author Hasan ORKAN  <hasanorkan@yandex.com>
 */

namespace Hasanorkan\LaravelPaytr;

use Hasanorkan\LaravelPaytr\Direkt\BankIdentification;
use Hasanorkan\LaravelPaytr\Direkt\Capi;
use Hasanorkan\LaravelPaytr\Direkt\DPayment;
use Hasanorkan\LaravelPaytr\Direkt\DPaymentVerification;
use Hasanorkan\LaravelPaytr\Direkt\Installment;
use Hasanorkan\LaravelPaytr\Payment\Basket;
use Hasanorkan\LaravelPaytr\Payment\Payment;
use Hasanorkan\LaravelPaytr\Payment\PaymentVerification;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Paytr
{
    private $client;
    private $credentials;
    private $options;

    public function __construct(Client $client, array $credentials = [], array $options = [])
    {
        $this->client = $client;
        $this->credentials = $credentials;
        $this->options = $options;
    }

    public function createPayment(Payment $payment)
    {
        return $payment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options)
            ->create();
    }

    public function payment()
    {
        return new Payment();
    }

    public function direktPayment(): DPayment
    {
        $payment = new DPayment();
        $payment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $payment;
    }

    public function bin()
    {
        $bin = new BankIdentification();
        $bin->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $bin;
    }

    public function installments()
    {
        $installment = new Installment();
        $installment->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $installment;
    }

    public function basket()
    {
        return new Basket();
    }

    public function direktPaymentVerification(Request $request)
    {
        $verification = new DPaymentVerification($request);
        $verification->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $verification;
    }

    public function capi()
    {
        $capi = new Capi();
        $capi->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $capi;
    }

    public function paymentVerification(Request $request)
    {
        $verification = new PaymentVerification($request);
        $verification->setClient($this->client)
            ->setCredentials($this->credentials)
            ->setOptions($this->options);
        return $verification;
    }
}