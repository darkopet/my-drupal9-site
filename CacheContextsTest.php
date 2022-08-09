<?php

namespace Drupal;

use Drupal\Tests\BrowserTestBase;

class CacheContextsTest extends BrowserTestBase {
  // Tests that for cached pages, permission-dependent access is respected.
  public function testBlackbox() {
    $this->assertAsAdminAndAnonB(TRUE, TRUE);
    \Drupal\node\Entity\Node::load(1)->setUnpublished()->save();
    $this->assertAsAdminAndAnonB(TRUE, FALSE);
  }
  protected function assertAsAdminAndAnonB($visible_for_admin, $visible_for_anon) {
    $this->drupalLogin($this->administrator);
    $this->assertThingB($visible_for_admin);
    $this->drupalLogout();
    $this->assertThingB($visible_for_anon);
  }
  protected function assertThingB($is_visible) {
    $this->drupalGet('/some/path');
    $is_visible
      ? $this->assertSession()->responseContains('initial title')
      : $this->assertSession()->responseNotContains('initial title');
  }

  // Tests that for cached pages, permission-dependent access is respected.
  public function testWhiteBox() {
    $this->assertAsAdminAndAnonW(TRUE, TRUE);
    \Drupal\node\Entity\Node::load(1)->setUnpublished()->save();
    $this->assertAsAdminAndAnonW(TRUE, FALSE);
  }
  protected function assertAsAdminAndAnonW($visible_for_admin, $visible_for_anon) {
    $this->drupalLogin($this->administrator);
    $this->assertThingW($visible_for_admin, 'MISS', NULL);
    $this->assertThingW($visible_for_admin, 'HIT', NULL);
    $this->drupalLogout();
    $this->assertThingW($visible_for_anon, 'MISS', 'MISS');
    $this->assertThingW($visible_for_anon, 'HIT', 'HIT');
  }
  protected function assertThingW($is_visible, $dpc, $pc) {
    parent::assertThingW($is_visible);
    $this->assertCacheContexts(['user.permissions']);
    $this->assertSame($this->getSession()->getResponseHeader('X-Drupal-Dynamic-Cache'), $dpc);
    $this->assertSame($this->getSession()->getResponseHeader('X-Drupal-Cache'), $pc);
  }
}
