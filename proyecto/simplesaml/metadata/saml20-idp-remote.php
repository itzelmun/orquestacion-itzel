<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['datacenter-idp'] = [
    'metadata-set' => 'saml20-idp-remote',
    'entityid' => 'datacenter-idp',
    'SingleSignOnService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'http://datacenter.ucol.mx/idp/saml2/idp/SSOService.php',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'http://datacenter.ucol.mx/idp/saml2/idp/SingleLogoutService.php',
        ],
    ],
    'certData' => 'MIIJRTCCBS2gAwIBAgIUZN48CMczz4QLedZfe/AVh2svtucwDQYJKoZIhvcNAQELBQAwMjELMAkGA1UEBhMCRVMxDzANBgNVBAgMBk1leGljbzESMBAGA1UEAwwJbG9jYWxob3N0MB4XDTIzMDEyNDIxMTcwMFoXDTI4MDEyMzIxMTcwMFowMjELMAkGA1UEBhMCRVMxDzANBgNVBAgMBk1leGljbzESMBAGA1UEAwwJbG9jYWxob3N0MIIEIjANBgkqhkiG9w0BAQEFAAOCBA8AMIIECgKCBAEAq9WPpd5YC19u/WtOxIUoSbelYaTK2b+xVdUxebWUJtE1ar5Rs6sKxHaTAsmqlyoroFvEkuqUXJWZ8SKHjptLUScKDIzxU4k20CDxWocIah5j9voh8nE+T6ktdze4QfXNJ94ZQvqz57l0/zYwAdYa7ckypCT3pAmSSIYRQQy2DXWkx57+ULcCZzg+o/Lhpt1mdX+546GlR9YfuozPsU3/up4NOs5hwA61CXNjsvTh6Mz0XZc9Q9qlvQhfGq/UppBQe/MNdHFwowbAUxlpw7zBBvm9Ju1tkgDV9GDJquq1dRGdjbFK0Fwr64BXiZ1nRUgZUD+81Uyeab4vhbUVgWZE1tYsL6CFUvUZxe8dHUTwjORx2q2+GRIm+0L75vEU0SgwBrQAVvcNyZtu7IUzrGW4ofLIHKeYzcl4PYXGNqHoFb35cMuSojJ4KEM3VwLDlAK0CwjTaR0yHwvp8Zjbm6RV6yykbIMJQuT48TgJMJAVP9UZIrPYszNcIdXkJDwzcoIAjLO1OTgV4VSESZ8nBxwbm9pNoKrbPs7saal8j+8ML3SJv8D6IsBFrVtxlGaaaTR8VEKzd82Xuh4U2fZ9jwppRJMIkuvReddoFxUOIYiwmirO7+uW64PXHR3LFi8PxLYpcGNk4b7TCaZhM9Gh8dD1X0V91LgEKnW8/JPoUrOLd6Al3VzSBzCgmZAfH5oGwVNR8xZJVUy7kwuu+2BZE6OY8WlLHYe3FqfhKSC7pXekg5yG47TinrEzXfQmmzw2pXnDrzgWIHsB6VO0yfTPbg7kl14TxJK6QivunmSd0L99HUjv8EPEmF9OxfY3FtNKJEGtu3sCSbcePZFBnd1NrqpnZjkUWnPh55StfVEU2pi17LgP2GqRd8LNmhW9ZcQf5YUlPEzYZelTeTnxGFUuxe4oK/rBZH1RpRtn/dnYyuRRa4X93npuM6w/3+dIMP2BqogOyyDEGfSwp36YiAi2pK2zQVbSuJCHq2vZPetXxASO/lbhQZEgAkQkkUKr9mrmTOv9oDMl27X8VpKJxR6LqsL+dCiHmsE3N/aVa+JPwbWgWNLg5Ru5m4iWxcBwlKvrl3ViOaN1/pFBLBB3xhSCqJT3GWiFJGZ6egE5JkUbKgdDu3pRaUUCW7ZNQJxlCogJmIIjfSsfB1KwMFf9qPf3PJYFBXtEotLHV4Z5A27quSpDmQPQEwpxDgUA2IKap4DeMgUvnBG4Bfy4k/mtHhXMCSGzq1sH043Boq7wznHqLLENKNgTOtrDfLa7PE2QyH23UZ2N95MLOzVq9Fe5ZlIRfy1p5AstP239YxCnnuq/KY1alO7MbCnZLvvJO5ovl8itaGLWoWbAq+3U0Bln2CKoTPARcwIDAQABo1MwUTAdBgNVHQ4EFgQUXzczPmtMJL/n7dXYR6zQe5XUTXIwHwYDVR0jBBgwFoAUXzczPmtMJL/n7dXYR6zQe5XUTXIwDwYDVR0TAQH/BAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCBAEAVWx/SWqVFdg3GJOfUQUryic59HXr0D9TmsA4Adw1LhMEeLdbHdLZaycL+5G/JigQan/cWh9RxPc+MRJqqHxE9d8BzguUYrnJVfudIx1tQkY4ef9qTOrYHVxRUNz6raEMX0w33TsAzaCa/79BqEarr+KzyW5mWpXQtFHAetOoR8nCUlf0A0neLlXxcIxF9BmqzTFXLw6PazDyrdxq2NxI1/NI6t4RPhcuEz3CLxWZYCuhHhMgBa/th3T9mhZaCxUdytdC87laZJLoidYybVzNf3zOETUeK1G50Hz1fIJnLAf6uvKtXQsHplN6wl++5AqGePjsZRXgfksGDc0RNno3pdVz97ZEsD/sKllTjDGvrai5+Sz7BBdP1Z1geaF+zs+sU7dBkmnix9DcRbWzHBjEwL8nF9b/YsGs9M248+xavGICowtZAz+A0WDEr+qR1kcGxbtXE4LJ7lIJv3qD+pjyLXFB837pPaVOO4q85/MBa4PnHW8LZnAeSuVWZFez/+mBSWW4ZcBKzbxg5oEJOZI3ZImoM3d8Os2xyGdZ+89UtC85mpCg5j8C8Gepo4SGtkMsfX1Bvu6odk3JH907E0KbRmKDkLQxwS+WPno3xwqv+PvnMLAlw/6cTw9X+arzrk20IycvSsbCaEGg32gulPbZ+pRwSdwIIzIqkyg4nHAjXChRHn7k4EqWcroKcxVDUW4sz2gCOzUxHxTX71gbFmp7lnVuf3mbKLB7MTsR5bhLJqNIAAtHe3ZNOVYGJEOnxtVCvohkhgKl8KkTVlfWK7u6A6wDLX/61HAT+W8sM9NscsjOfqvTF96HlJsbO1M4k/kKkot7/2Tq5I2lXg4yRpbaDjVezG6M6Eu3v8ZAII0L2PZwspKBNWMmHG1EqWhyDcoBjnci8pPf3PnBUdRPqMluucZhJeVY/1A2BEAnu/Bfiqj+1qeB00bwL63L4V65H4LDS+Qy5DN/tpJQ5IQiYC3hGhcBuQ+Dg9hKe+fJKv9oNrlRPCvLb58jqKpAwrer/7cnZJZm0rzCWDF8F1HIXh5RoxzsQxuft3QWJGLv48uWZqnS/gTwkrPh0cSd/1zq2eIag0JPctQ/7NX/JRZPDt+Ih9bD9Ae46uw3FrOzUIM6wQThsAyKUXjMR4zU3eR7m5QuaHVbt6Hfug4iS61XT+lqpiv+1ciCpqUcv0G0dzopumjFFGr/K/p5bZhrGmFYKCERiyQeRN1YsysaQ89am3O5HlygXBZ2slE0cmQwWA02Js53bRFwwace+95P//fig92fUasDNKIn1LNYDgSOpnqDF9Fe6BY3MKwQW7jaR7Dmzi7Q17hRCwrosSU7npbUpqZUP0MOZsLVp1wb4iecJ8h4lg==',
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
];




