# Operating system information
Application easily parsing and displaying system information of the host.

### Installer

```console
	composer require olivia/os-info
```

### Use

#### Basic
```php
	$info = new Olivia\OsInfo\OSInfo(
		new Linfo\Linfo
	);

	// Cpu
	echo $info->getCpu();
```

#### Laravel or other PHP framework
```php
	use Olivia\OsInfo\OSInfo;

	$info = app(OSInfo::class);

	// Cpu
	echo $info->getCpu();
```

### API
* getCpu() : string
* getServer() : string
* getMemory() : string
* getMysqlVersion(string $host = '127.0.0.1', string $username = 'root', ?string password = null) : string
* getPHPVersion() : string
* getUploadMaxFileSize() : string
