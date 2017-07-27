<?php
namespace bunq\Model\Generated;

use bunq\Context\ApiContext;
use bunq\Http\ApiClient;
use bunq\Model\BunqModel;
use bunq\Model\Generated\Object\PermittedDevice;

/**
 * Create a credential of a user for server authentication, or delete the
 * credential of a user for server authentication.
 *
 * @generated
 */
class UserCredentialPasswordIp extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/credential-password-ip/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/credential-password-ip';

    /**
     * Object type.
     */
    const OBJECT_TYPE = 'CredentialPasswordIp';

    /**
     * The status of the credential.
     *
     * @var string
     */
    protected $status;

    /**
     * When the status is PENDING_FIRST_USE: when the credential expires.
     *
     * @var string
     */
    protected $expiryTime;

    /**
     * When the status is PENDING_FIRST_USE: the value of the token.
     *
     * @var string
     */
    protected $tokenValue;

    /**
     * When the status is ACTIVE: the details of the device that may use the
     * credential.
     *
     * @var PermittedDevice
     */
    protected $permittedDevice;

    /**
     * @param ApiContext $apiContext
     * @param int $userId
     * @param int $userCredentialPasswordIpId
     * @param string[] $customHeaders
     *
     * @return BunqModel|UserCredentialPasswordIp
     */
    public static function get(ApiContext $apiContext, $userId, $userCredentialPasswordIpId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [$userId, $userCredentialPasswordIpId]
            ),
            $customHeaders
        );

        return static::fromJson($response);
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param ApiContext $apiContext
     * @param int $userId
     * @param string[] $customHeaders
     *
     * @return BunqModel[]|UserCredentialPasswordIp[]
     */
    public static function listing(ApiContext $apiContext, $userId, array $customHeaders = [])
    {
        $apiClient = new ApiClient($apiContext);
        $response = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [$userId]
            ),
            $customHeaders
        );

        return static::fromJsonList($response, self::OBJECT_TYPE);
    }

    /**
     * The status of the credential.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * When the status is PENDING_FIRST_USE: when the credential expires.
     *
     * @return string
     */
    public function getExpiryTime()
    {
        return $this->expiryTime;
    }

    /**
     * @param string $expiryTime
     */
    public function setExpiryTime($expiryTime)
    {
        $this->expiryTime = $expiryTime;
    }

    /**
     * When the status is PENDING_FIRST_USE: the value of the token.
     *
     * @return string
     */
    public function getTokenValue()
    {
        return $this->tokenValue;
    }

    /**
     * @param string $tokenValue
     */
    public function setTokenValue($tokenValue)
    {
        $this->tokenValue = $tokenValue;
    }

    /**
     * When the status is ACTIVE: the details of the device that may use the
     * credential.
     *
     * @return PermittedDevice
     */
    public function getPermittedDevice()
    {
        return $this->permittedDevice;
    }

    /**
     * @param PermittedDevice $permittedDevice
     */
    public function setPermittedDevice(PermittedDevice $permittedDevice)
    {
        $this->permittedDevice = $permittedDevice;
    }
}
