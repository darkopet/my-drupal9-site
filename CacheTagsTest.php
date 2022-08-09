<?php

namespace Drupal;

use Drupal\Tests\BrowserTestBase;

class CacheTagsTest extends BrowserTestBase {
  // Tests that for cached pages, content changes are visible immediately.
  public function testBlackbox() {
    $this->assertThingB('initial title');
    \Drupal\node\Entity\Node::load(1)->setTitle('foobar')->save();
    $this->assertThingB('foobar');
  }
  protected function assertThingB($title) {
    $this->drupalGet('/some/path');
    $this->assertSession()->responseContains($title);
  }

  // Tests that for cached pages, content changes are visible immediately.
  public function testWhitebox() {
    $this->assertThingW('initial title', 'MISS', 'MISS');
    $this->assertThingW('initial title', 'HIT', 'HIT');
    \Drupal\node\Entity\Node::load(1)->setTitle('foobar')->save();
    $this->assertThingW('foobar', 'MISS', 'MISS');
    $this->assertThingW('foobar', 'HIT', 'HIT');
  }
  protected function assertThingW($title, $dpc, $pc) {
    $this->drupalGet('/some/path');
    $this->assertSession()->responseContains($title);
    $this->assertCacheTags(['node:1']);
    $this->assertSame($this->getSession()->getResponseHeader('X-Drupal-Dynamic-Cache'), $dpc);
    $this->assertSame($this->getSession()->getResponseHeader('X-Drupal-Cache'), $pc);
  }
}
