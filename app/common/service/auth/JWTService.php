<?php

namespace app\common\service\auth;

use app\common\exception\BizException;
use app\common\exception\UnauthorizedException;
use app\common\ideHelper\IDEJWTPayloadStdClass;
use Exception;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use stdClass;
use think\facade\Config;
use think\facade\Log;
use think\Request;
use UnexpectedValueException;

/*
 * Json Web Token.
 */
class JWTService
{
    /**
     * 获取 - token.
     */
    public static function getToken(Request $request): string
    {
        return trim(str_ireplace('bearer', '', $request->header('authorization', '')));
    }

    /**
     * 编码 - JWT.
     *
     * @throws BizException
     */
    public static function encode(int $uid): string
    {
        $time = time();
        $payload = [
            'iss' => 'auth',        // 签发者
            'sub' => 'token',       // 主题
            'iat' => $time,         // 签发时间
            'exp' => $time + 86400, // 过期时间 ( 1 天后 )
            'uid' => $uid,          // 携带数据
        ];

        return JWT::encode($payload, self::key(), 'HS256');
    }

    /**
     * 解码 - JWT.
     *
     * @param string $jwt 已编码的 JWT 字符串
     * @throws UnauthorizedException
     * @return IDEJWTPayloadStdClass
     */
    public static function decode(string $jwt): stdClass
    {
        try {
            JWT::$leeway = 60; // 当前时间减去 60，留点余地
            return JWT::decode($jwt, new Key(self::key(), 'HS256'));
        } catch (SignatureInvalidException $e) { // 签名验证失败
            $message = 'token 验证失败';
        } catch (BeforeValidException $e) {
            $message = "token 未生效";
        } catch (ExpiredException $e) {
            $message = 'token 已过期';
        } catch (UnexpectedValueException $e) {
            $message = 'token 无效';
        } catch (BizException $e) {
            $message = $e->getMessage();
        } catch (Exception $e) {
            $message = 'token 未知错误';
        }

        Log::error($message);
        Log::error($e->getMessage());
        throw new UnauthorizedException($message);
    }

    /**
     * 获取 - JWT Key.
     *
     * @throws BizException
     */
    protected static function key(): string
    {
        $key = Config::get('jwt.key');
        if (empty($key)) {
            throw new BizException('jwt.key 未设置');
        }

        return $key;
    }
}
