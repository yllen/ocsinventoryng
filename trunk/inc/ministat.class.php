<?php
/*
 * @version $Id: HEADER 14684 2011-06-11 06:32:40Z remi $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2011 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 --------------------------------------------------------------------------
*/

// Original Author of file: Remi Collet (Fedora at FamilleCollet dot com)
// Purpose of file: compute simple statistics.
// ----------------------------------------------------------------------

class PluginOcsinventoryngMiniStat {

   public $Min = 0;
   public $Max = 0;
   public $Tot = 0;
   public $Nb  = 0;

   function Reset() {
      $this->Min = $this->Max = $this->Tot = $this->Nb = 0;
   }

   function GetMinimum () {
      return $this->Min;
   }

   function GetMaximum () {
      return $this->Max;
   }

   function GetTotal () {
      return $this->Tot;
   }

   function GetCount () {
      return $this->Nb;
   }

   function GetAverage () {
      return $this->Nb>0 ? $this->Tot / $this->Nb : 0;
   }

   function AddValue($Value) {

      if ($this->Nb > 0) {
         if ($Value < $this->Min) {
            $this->Min = $Value;
         }
         if ($Value > $this->Max) {
            $this->Max = $Value;
         }
         $this->Tot += $Value;
         $this->Nb++;
      } else {
         $this->Min = $this->Max = $this->Tot = $Value;
         $this->Nb = 1;
      }
   }

}
?>