Feature: Examples
  @phpunit-inheritance
  Scenario Outline: Examples for php-fox/phpunit-inheritance
    Given I tested <example_file> with PHPUnit
    Then I should see PHPUnit stdout from <stdout_file>
    And I should see stderr from <stderr_file>
    And I should see exit code <exit_code>

    Examples:
      | example_file                        | stdout_file                            | stderr_file                            | exit_code |
      | "AssertExtendsClassTest.php"        | "AssertExtendsClassTest.stdout"        | "AssertExtendsClassTest.stderr"        | 1         |
      | "AssertImplementsInterfaceTest.php" | "AssertImplementsInterfaceTest.stdout" | "AssertImplementsInterfaceTest.stderr" | 1         |
      | "AssertUsesTraitTest.php"           | "AssertUsesTraitTest.stdout"           | "AssertUsesTraitTest.stderr"           | 1         |
      | "extendsClassTest.php"              | "extendsClassTest.stdout"              | "extendsClassTest.stderr"              | 1         |
      | "implementsInterfaceTest.php"       | "implementsInterfaceTest.stdout"       | "implementsInterfaceTest.stderr"       | 1         |
      | "usesTraitTest.php"                 | "usesTraitTest.stdout"                 | "usesTraitTest.stderr"                 | 1         |

  @phpunit-pcre
  Scenario Outline: Examples for php-fox/phpunit-pcre
    Given I tested <example_file> with PHPUnit
    Then I should see PHPUnit stdout from <stdout_file>
    And I should see stderr from <stderr_file>
    And I should see exit code <exit_code>

    Examples:
      | example_file                     | stdout_file                        | stderr_file                        | exit_code |
      | "AssertHasPregCapturesTest.php"  | "AssertHasPregCapturesTest.stdout" | "AssertHasPregCapturesTest.stderr" | 1         |
      | "hasPregCapturesTest.php"        | "hasPregCapturesTest.stdout"       | "hasPregCapturesTest.stderr"       | 1         |

  @phpunit-properties
  Scenario Outline: Examples for php-fox/phpunit-properties
    Given I tested <example_file> with PHPUnit
    Then I should see PHPUnit stdout from <stdout_file>
    And I should see stderr from <stderr_file>
    And I should see exit code <exit_code>

    Examples:
      | example_file                                | stdout_file                                    | stderr_file                                    | exit_code |
      | "AssertClassPropertiesEqualToTest.php"      | "AssertClassPropertiesEqualToTest.stdout"      | "AssertClassPropertiesEqualToTest.stderr"      | 1         |
      | "AssertClassPropertiesIdenticalToTest.php"  | "AssertClassPropertiesIdenticalToTest.stdout"  | "AssertClassPropertiesIdenticalToTest.stderr"  | 1         |
      | "AssertObjectPropertiesEqualToTest.php"     | "AssertObjectPropertiesEqualToTest.stdout"     | "AssertObjectPropertiesEqualToTest.stderr"     | 1         |
      | "AssertObjectPropertiesIdenticalToTest.php" | "AssertObjectPropertiesIdenticalToTest.stdout" | "AssertObjectPropertiesIdenticalToTest.stderr" | 1         |
      | "classPropertiesEqualToTest.php"            | "classPropertiesEqualToTest.stdout"            | "classPropertiesEqualToTest.stderr"            | 1         |
      | "classPropertiesIdenticalToTest.php"        | "classPropertiesIdenticalToTest.stdout"        | "classPropertiesIdenticalToTest.stderr"        | 1         |
      | "objectPropertiesEqualToTest.php"           | "objectPropertiesEqualToTest.stdout"           | "objectPropertiesEqualToTest.stderr"           | 1         |
      | "objectPropertiesIdenticalToTest.php"       | "objectPropertiesIdenticalToTest.stdout"       | "objectPropertiesIdenticalToTest.stderr"       | 1         |
