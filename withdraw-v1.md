# Wallet Document
### Main Application Token
```php
$user->createToken('mac-book-pro-m4', [])->plainTextToken;
```
>Note : [ ] denotes empty ability.

### Wallet Withdraw Controller
```php
WalletWithdrawAction::initiate($request->validated())
            ->generateToken()
            ->execute()
            ->emit()
            ->log()
            ->complete();
```

### Wallet Withdraw Action
```php
public function generateToken() {
    $this->token = $this->user->createToken('mac-book-pro-m4', ['wallet:withdraw'], now()->addMinutes(2))->plainTextToken;
    //Note : The wallet:withdraw ability token valid for 2 mins only
}

public function execute() {
    $withdraw = Http::withToken($this->token)
                    ->acceptJson()
                    ->baseUrl(config('services.wallet.base_url'))
                    ->post('/withdraw', []);
            
    if ($withdraw->failed()) {
        // throw exception
    }
}
```

---

# Wallet Microservice

### Withdraw Middleware

```php
public function handle(Request $request, Closure $next): Response
{
   abort_unless($request->user()->tokenCan('wallet:withdraw'), \Illuminate\Http\Response::HTTP_UNAUTHORIZED, 'Unauthorized');

   return $next($request);
}
```

### Withdraw Service

```php
class WalletService
{
    public function __construct(int private $balance = 1000) {}

    public function withdraw(int $amount): void
    {
        if ($amount > $this->balance) {
            throw new NotEnoughBalanceException();
        }

        $this->balance -= $amount;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
}
```
