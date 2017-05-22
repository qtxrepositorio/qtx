GO 
	
	DECLARE @cod varchar(50)
	DECLARE @desc varchar(MAX)


	DECLARE product_cursor CURSOR FOR  
		SELECT 
			[B2_COD]
		FROM [SB2010] WHERE B2_XDESC = '' AND D_E_L_E_T_ != '*' AND [B2_COD] LIKE 'QEX%' 

	OPEN product_cursor; 
	
	FETCH NEXT FROM product_cursor INTO @cod;  
  
	-- Check @@FETCH_STATUS to see if there are any more rows to fetch.  
	WHILE @@FETCH_STATUS = 0  
	BEGIN  
	
		SELECT @desc = [B1_DESC] FROM [SB1010] WHERE [SB1010].[B1_COD] = @cod ; 
		
		IF (@desc != '') BEGIN
			
			UPDATE [SB2010]
				SET [B2_XDESC] = @desc
					WHERE [B2_COD] = @cod  

		END

	   -- This is executed as long as the previous fetch succeeds.  
	   FETCH NEXT FROM product_cursor INTO @cod; 

	END  
  
	CLOSE product_cursor;  
	DEALLOCATE product_cursor;   

GO
