<?php declare(strict_types = 1);

namespace SlevomatCodingStandard\Sniffs\Classes;

class SuperfluousInterfaceNamingSniffTest extends \SlevomatCodingStandard\Sniffs\TestCase
{

	public function testNoErrors(): void
	{
		$report = self::checkFile(__DIR__ . '/data/superfluousInterfaceNamingNoErrors.php');
		self::assertNoSniffErrorInFile($report);
	}

	public function testErrors(): void
	{
		$report = self::checkFile(__DIR__ . '/data/superfluousInterfaceNamingErrors.php');

		self::assertSame(3, $report->getErrorCount());

		self::assertSniffError($report, 3, SuperfluousInterfaceNamingSniff::CODE_SUPERFLUOUS_SUFFIX, 'Superfluous suffix "Interface".');
		self::assertSniffError($report, 8, SuperfluousInterfaceNamingSniff::CODE_SUPERFLUOUS_SUFFIX, 'Superfluous suffix "interface".');
		self::assertSniffError($report, 13, SuperfluousInterfaceNamingSniff::CODE_SUPERFLUOUS_SUFFIX, 'Superfluous suffix "iNtErFaCe".');
	}

}