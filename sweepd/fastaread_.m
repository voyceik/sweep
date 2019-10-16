function mret = fastaread_(xfile)
	 FID = fopen(xfile);
	 z = fread(FID);
	 fclose(FID);
	 z = [char(z') '#'];
	 z(strfind(z,[char(10) '>'])) = '#';
	 z(strfind(z,[char(10)])) = '@';
	 Hd = gettexbetween([z '>'],'>','#');
	 xHeader = cellfun(@(x) x(1:strfind(x,'@')-1),Hd,'UniformOutput',false);
	 xSequence = cellfun(@(x) x((strfind(x,'@')+1):end),Hd,'UniformOutput',false);
	 xSequence = cellfun(@(x) x(x~='@'),xSequence,'UniformOutput',false);
	 mret = cell2struct([xHeader' xSequence'],{'Header','Sequence'},2);
end
