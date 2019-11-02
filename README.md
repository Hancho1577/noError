# noError
 PMMP 비 공식 API 3.10.0 에서 플레이어가 죽을 때 발생하는 오류를 임시적으로 해결하기 위한 플러그인입니다.
 
설명
---------
플레이어가 죽을경우 Crash 발생을 피하기 위해 플레이어를 스폰으로 이동시킵니다.

스폰장소는 플레이어에따라 다를 수 있으며, 인벤세이브가 활성화 되어있지 않을경우 아이템을 drop합니다. (SimpleArea 인벤세이브와 호환되는것을 확인하였으나 테스트 후 적용하시길 바랍니다.)

주의사항
---------
- 서버 환경에따라 문제가 발생할 수 있습니다.
- PlayerDeathEvent를 발생시키지 않습니다. (Death 카운팅 플러그인이 있을경우 작동하지 않을 수 있습니다.)
- 리스폰화면 없이 즉시 리스폰됩니다.
- 이펙트화 허기가 리셋됩니다.
